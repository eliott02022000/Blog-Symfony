<?php

namespace App\Entity;

use App\Repository\BlogpostCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BlogpostCategoryRepository::class)
 */
class BlogpostCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="blogpostCategories")
     */
    private $blogpost;

    /**
     * @ORM\ManyToMany(targetEntity=BlogPost::class, inversedBy="blogpostCategories")
     */
    private $category;

    public function __construct()
    {
        $this->blogpost = new ArrayCollection();
        $this->category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Category[]
     */
    public function getBlogpost(): Collection
    {
        return $this->blogpost;
    }

    public function addBlogpost(Category $blogpost): self
    {
        if (!$this->blogpost->contains($blogpost)) {
            $this->blogpost[] = $blogpost;
        }

        return $this;
    }

    public function removeBlogpost(Category $blogpost): self
    {
        if ($this->blogpost->contains($blogpost)) {
            $this->blogpost->removeElement($blogpost);
        }

        return $this;
    }

    /**
     * @return Collection|BlogPost[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(BlogPost $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(BlogPost $category): self
    {
        if ($this->category->contains($category)) {
            $this->category->removeElement($category);
        }

        return $this;
    }
}
