<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190523120648 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE child (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, property_one BOOLEAN NOT NULL, property_two VARCHAR(255) NOT NULL, property_three BOOLEAN NOT NULL)');
        $this->addSql('CREATE TABLE container (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, child_id INTEGER NOT NULL, property_one BOOLEAN NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7A2EC1BDD62C21B ON container (child_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE child');
        $this->addSql('DROP TABLE container');
    }
}
