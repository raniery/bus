<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170902022752 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA system');
        $this->addSql('CREATE TABLE system."user" (id UUID NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, deleted BOOLEAN DEFAULT \'false\' NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_58EDACC0F85E0677 ON system."user" (username)');
        $this->addSql('COMMENT ON COLUMN system."user".id IS \'(DC2Type:uuid)\'');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE system."user"');
    }
}
