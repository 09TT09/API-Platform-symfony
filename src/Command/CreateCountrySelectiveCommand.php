<?php

namespace App\Command;

use ApiPlatform\Api\QueryParameterValidator\Validator\Length;
use App\Entity\Country;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpClient\HttpClient;
use Doctrine\ORM\EntityManagerInterface;


#[AsCommand(
    name: 'CreateCountrySelectiveCommand',
    description: 'Add a short description for your command',
)]
class CreateCountrySelectiveCommand extends Command
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $countryArray = array(
            'france',
            'argentina',
            'canada',
            'spain',
            'finland',
            'india',
            'angola',
            'australia',
            'japan',
            'cuba',
            'egypt',
            'serbia',
            'tunisia',
            'cambodia',
            'venezuela',
        );
        $arrayLength = count($countryArray);

        $client = HttpClient::create();
        for ($i = 1; $i < $arrayLength; $i++){
            $response = $client->request('GET', 'https://restcountries.com/v3.1/name/' . $countryArray[$i]);
            $statusCode = $response->getStatusCode();

            if ($statusCode !== 200) {
                throw new \Exception('An error has occured. API request failed. status code: ' . $statusCode);
            } else {
                $data = json_decode($response->getContent(), true);
                foreach ($data as $item) {
                    $country = new Country();

                    if (isset($item['name']['common'])) $country->setName($item['name']['common']);
                    else $country->setName('name not found');

                    if (isset($item['capital'])) $country->setCapital($item['capital']);
                    else $country->setCapital(['capital not found']);

                    if (isset($item['region'])) $country->setRegion($item['region']);
                    else $country->setRegion('region not found');

                    if (isset($item['subregion'])) $country->setSubregion($item['subregion']);
                    else $country->setSubregion('subregion not found');

                    if (isset($item['languages'])) $country->setLanguages($item['languages']);
                    else $country->setLanguages(['languages not found']);

                    if (isset($item['latlng'])) $country->setLatlng($item['latlng']);
                    else $country->setLatlng(['latlng not found']);

                    if (isset($item['area'])) $country->setArea($item['area']);
                    else $country->setArea('area not found');

                    if (isset($item['flags'])) $country->setFlags($item['flags']);
                    else $country->setFlags(['flags not found']);

                    if (isset($item['currencies'])) $country->setCurrencies($item['currencies']);
                    else $country->setCurrencies(['currencies not found']);

                    if (isset($item['independent'])) $country->setIndependent($item['independent']);
                    else $country->setIndependent('independent not found');

                    if (isset($item['status'])) $country->setStatus($item['status']);
                    else $country->setStatus('status not found');

                    if (isset($item['landlocked'])) $country->setLandlocked($item['landlocked']);
                    else $country->setLandlocked('landlocked not found');

                    if (isset($item['maps'])) $country->setMaps($item['maps']);
                    else $country->setMaps(['maps not found']);

                    if (isset($item['population'])) $country->setPopulation($item['population']);
                    else $country->setPopulation('population not found');

                    $this->entityManager->persist($country);
                    $this->entityManager->flush();
                }
            }
        }
        return Command::SUCCESS;
    }
}