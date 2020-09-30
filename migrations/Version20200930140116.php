<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200930140116 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C46C816C4');
        $this->addSql('DROP INDEX IDX_9474526C46C816C4 ON comment');
        $this->addSql('ALTER TABLE comment CHANGE associated_with_article_id related_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C4162C001 FOREIGN KEY (related_id) REFERENCES blog_post (id)');
        $this->addSql('CREATE INDEX IDX_9474526C4162C001 ON comment (related_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C4162C001');
        $this->addSql('DROP INDEX IDX_9474526C4162C001 ON comment');
        $this->addSql('ALTER TABLE comment CHANGE related_id associated_with_article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C46C816C4 FOREIGN KEY (associated_with_article_id) REFERENCES blog_post (id)');
        $this->addSql('CREATE INDEX IDX_9474526C46C816C4 ON comment (associated_with_article_id)');
    }
}
