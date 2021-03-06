<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180828120622 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit_cart DROP FOREIGN KEY FK_223BF55819EB6921');
        $this->addSql('DROP INDEX UNIQ_223BF55819EB6921 ON produit_cart');
        $this->addSql('ALTER TABLE produit_cart DROP client_id, CHANGE qte qte INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit_cart ADD client_id INT NOT NULL, CHANGE qte qte INT DEFAULT 1 NOT NULL');
        $this->addSql('ALTER TABLE produit_cart ADD CONSTRAINT FK_223BF55819EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_223BF55819EB6921 ON produit_cart (client_id)');
    }
}
