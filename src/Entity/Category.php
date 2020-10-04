<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=BlogpostCategory::class, mappedBy="blogpost")
     */
    private $blogpostCategories;

    public function __construct()
    {
        $this->blogpostCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|BlogpostCategory[]
     */
    public function getBlogpostCategories(): Collection
    {
        return $this->blogpostCategories;
    }

    public function addBlogpostCategory(BlogpostCategory $blogpostCategory): self
    {
        if (!$this->blogpostCategories->contains($blogpostCategory)) {
            $this->blogpostCategories[] = $blogpostCategory;
            $blogpostCategory->addBlogpost($this);
        }

        return $this;
    }

    public function removeBlogpostCategory(BlogpostCategory $blogpostCategory): self
    {
        if ($this->blogpostCategories->contains($blogpostCategory)) {
            $this->blogpostCategories->removeElement($blogpostCategory);
            $blogpostCategory->removeBlogpost($this);
        }

        return $this;
    }
}
