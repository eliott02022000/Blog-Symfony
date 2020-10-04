<?php

namespace App\Entity;

use App\Repository\BlogPostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BlogPostRepository::class)
 */
class BlogPost
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $banner;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="blogPosts")
     */
    private $author;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="related")
     */
    private $comments;

    /**
     * @ORM\ManyToMany(targetEntity=BlogpostCategory::class, mappedBy="category")
     */
    private $blogpostCategories;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->blogpostCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getBanner(): ?string
    {
        return $this->banner;
    }

    public function setBanner(string $banner): self
    {
        $this->banner = $banner;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setRelated($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getrelated() === $this) {
                $comment->setrelated(null);
            }
        }

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
            $blogpostCategory->addCategory($this);
        }

        return $this;
    }

    public function removeBlogpostCategory(BlogpostCategory $blogpostCategory): self
    {
        if ($this->blogpostCategories->contains($blogpostCategory)) {
            $this->blogpostCategories->removeElement($blogpostCategory);
            $blogpostCategory->removeCategory($this);
        }

        return $this;
    }
}
