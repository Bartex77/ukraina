<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220329161635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_type (id INT AUTO_INCREMENT NOT NULL, item_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_44EE13D2126F525E (item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_type_specific (id INT AUTO_INCREMENT NOT NULL, item_type_id INT NOT NULL, unit_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_669D6A75CE11AAC7 (item_type_id), INDEX IDX_669D6A75F8BD700D (unit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE item_type ADD CONSTRAINT FK_44EE13D2126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE item_type_specific ADD CONSTRAINT FK_669D6A75CE11AAC7 FOREIGN KEY (item_type_id) REFERENCES item_type (id)');
        $this->addSql('ALTER TABLE item_type_specific ADD CONSTRAINT FK_669D6A75F8BD700D FOREIGN KEY (unit_id) REFERENCES unit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item_type DROP FOREIGN KEY FK_44EE13D2126F525E');
        $this->addSql('ALTER TABLE item_type_specific DROP FOREIGN KEY FK_669D6A75CE11AAC7');
        $this->addSql('ALTER TABLE item_type_specific DROP FOREIGN KEY FK_669D6A75F8BD700D');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE item_type');
        $this->addSql('DROP TABLE item_type_specific');
        $this->addSql('DROP TABLE unit');
    }
}
