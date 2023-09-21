<?php

namespace App\Test\Controller;

use App\Entity\Pokemon;
use App\Repository\PokemonRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PokemonControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private PokemonRepository $repository;
    private string $path = '/pokemon/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(Pokemon::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Pokemon index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'pokemon[name]' => 'Testing',
            'pokemon[type_1]' => 'Testing',
            'pokemon[type_2]' => 'Testing',
            'pokemon[total]' => 'Testing',
            'pokemon[hp]' => 'Testing',
            'pokemon[attack]' => 'Testing',
            'pokemon[defense]' => 'Testing',
            'pokemon[sp_atk]' => 'Testing',
            'pokemon[sp_def]' => 'Testing',
            'pokemon[speed]' => 'Testing',
            'pokemon[generation]' => 'Testing',
            'pokemon[legendary]' => 'Testing',
        ]);

        self::assertResponseRedirects('/pokemon/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Pokemon();
        $fixture->setName('My Title');
        $fixture->setType_1('My Title');
        $fixture->setType_2('My Title');
        $fixture->setTotal('My Title');
        $fixture->setHp('My Title');
        $fixture->setAttack('My Title');
        $fixture->setDefense('My Title');
        $fixture->setSp_atk('My Title');
        $fixture->setSp_def('My Title');
        $fixture->setSpeed('My Title');
        $fixture->setGeneration('My Title');
        $fixture->setLegendary('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Pokemon');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Pokemon();
        $fixture->setName('My Title');
        $fixture->setType_1('My Title');
        $fixture->setType_2('My Title');
        $fixture->setTotal('My Title');
        $fixture->setHp('My Title');
        $fixture->setAttack('My Title');
        $fixture->setDefense('My Title');
        $fixture->setSp_atk('My Title');
        $fixture->setSp_def('My Title');
        $fixture->setSpeed('My Title');
        $fixture->setGeneration('My Title');
        $fixture->setLegendary('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'pokemon[name]' => 'Something New',
            'pokemon[type_1]' => 'Something New',
            'pokemon[type_2]' => 'Something New',
            'pokemon[total]' => 'Something New',
            'pokemon[hp]' => 'Something New',
            'pokemon[attack]' => 'Something New',
            'pokemon[defense]' => 'Something New',
            'pokemon[sp_atk]' => 'Something New',
            'pokemon[sp_def]' => 'Something New',
            'pokemon[speed]' => 'Something New',
            'pokemon[generation]' => 'Something New',
            'pokemon[legendary]' => 'Something New',
        ]);

        self::assertResponseRedirects('/pokemon/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getName());
        self::assertSame('Something New', $fixture[0]->getType_1());
        self::assertSame('Something New', $fixture[0]->getType_2());
        self::assertSame('Something New', $fixture[0]->getTotal());
        self::assertSame('Something New', $fixture[0]->getHp());
        self::assertSame('Something New', $fixture[0]->getAttack());
        self::assertSame('Something New', $fixture[0]->getDefense());
        self::assertSame('Something New', $fixture[0]->getSp_atk());
        self::assertSame('Something New', $fixture[0]->getSp_def());
        self::assertSame('Something New', $fixture[0]->getSpeed());
        self::assertSame('Something New', $fixture[0]->getGeneration());
        self::assertSame('Something New', $fixture[0]->getLegendary());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Pokemon();
        $fixture->setName('My Title');
        $fixture->setType_1('My Title');
        $fixture->setType_2('My Title');
        $fixture->setTotal('My Title');
        $fixture->setHp('My Title');
        $fixture->setAttack('My Title');
        $fixture->setDefense('My Title');
        $fixture->setSp_atk('My Title');
        $fixture->setSp_def('My Title');
        $fixture->setSpeed('My Title');
        $fixture->setGeneration('My Title');
        $fixture->setLegendary('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/pokemon/');
    }
}
