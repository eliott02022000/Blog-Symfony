<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201004211557 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blogpost_category_category (blogpost_category_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_48CAEED531248CA2 (blogpost_category_id), INDEX IDX_48CAEED512469DE2 (category_id), PRIMARY KEY(blogpost_category_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blogpost_category_blog_post (blogpost_category_id INT NOT NULL, blog_post_id INT NOT NULL, INDEX IDX_A0CEB29731248CA2 (blogpost_category_id), INDEX IDX_A0CEB297A77FBEAF (blog_post_id), PRIMARY KEY(blogpost_category_id, blog_post_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blogpost_category_category ADD CONSTRAINT FK_48CAEED531248CA2 FOREIGN KEY (blogpost_category_id) REFERENCES blogpost_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blogpost_category_category ADD CONSTRAINT FK_48CAEED512469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blogpost_category_blog_post ADD CONSTRAINT FK_A0CEB29731248CA2 FOREIGN KEY (blogpost_category_id) REFERENCES blogpost_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blogpost_category_blog_post ADD CONSTRAINT FK_A0CEB297A77FBEAF FOREIGN KEY (blog_post_id) REFERENCES blog_post (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE blogpost_category_category');
        $this->addSql('DROP TABLE blogpost_category_blog_post');
    }
}
