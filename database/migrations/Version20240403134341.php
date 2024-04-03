<?php

declare(strict_types=1);

namespace Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240403134341 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE translations (id INT AUTO_INCREMENT NOT NULL, word_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, past_form VARCHAR(255) DEFAULT NULL, plural_form VARCHAR(255) DEFAULT NULL, superlative_form VARCHAR(255) DEFAULT NULL, comparative_form VARCHAR(255) DEFAULT NULL, INDEX IDX_C6B7DA87E357438D (word_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE words (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE translations ADD CONSTRAINT FK_C6B7DA87E357438D FOREIGN KEY (word_id) REFERENCES words (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE translations DROP FOREIGN KEY FK_C6B7DA87E357438D');
        $this->addSql('DROP TABLE translations');
        $this->addSql('DROP TABLE words');
    }
}
