<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190524094326 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE sub_container (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, flags_id INTEGER DEFAULT NULL, container_id INTEGER DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D5AFAAA537803436 ON sub_container (flags_id)');
        $this->addSql('CREATE INDEX IDX_D5AFAAA5BC21F742 ON sub_container (container_id)');
        $this->addSql('CREATE TABLE container (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, flags_id INTEGER DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7A2EC1B37803436 ON container (flags_id)');
        $this->addSql('CREATE TABLE flags (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, container_id INTEGER DEFAULT NULL, sub_container_id INTEGER DEFAULT NULL, test BOOLEAN NOT NULL, string VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_B0541BABC21F742 ON flags (container_id)');
        $this->addSql('CREATE INDEX IDX_B0541BAAB73B074 ON flags (sub_container_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE sub_container');
        $this->addSql('DROP TABLE container');
        $this->addSql('DROP TABLE flags');
    }
}
