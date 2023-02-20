<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230220200258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CFC6BF02');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C33D1A3E7');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C649A58CD');
        $this->addSql('DROP INDEX IDX_232B318C33D1A3E7 ON game');
        $this->addSql('DROP INDEX IDX_232B318CFC6BF02 ON game');
        $this->addSql('DROP INDEX IDX_232B318C649A58CD ON game');
        $this->addSql('ALTER TABLE game DROP tournament_id, DROP player_one_id, DROP player_two_id');
        $this->addSql('ALTER TABLE tournament CHANGE description description LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game ADD tournament_id INT DEFAULT NULL, ADD player_one_id INT DEFAULT NULL, ADD player_two_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CFC6BF02 FOREIGN KEY (player_two_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C33D1A3E7 FOREIGN KEY (tournament_id) REFERENCES tournament (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C649A58CD FOREIGN KEY (player_one_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_232B318C33D1A3E7 ON game (tournament_id)');
        $this->addSql('CREATE INDEX IDX_232B318CFC6BF02 ON game (player_two_id)');
        $this->addSql('CREATE INDEX IDX_232B318C649A58CD ON game (player_one_id)');
        $this->addSql('ALTER TABLE tournament CHANGE description description VARCHAR(1000) DEFAULT NULL');
    }
}
