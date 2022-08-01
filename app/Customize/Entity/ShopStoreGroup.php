<?php

namespace Customize\Entity;

use Doctrine\ORM\Mapping as ORM;

if (!class_exists('\Customize\Entity\ShopStoreGroup')) {
    /**
     * ShopStoreGroup
     *
     * @ORM\Table(name="c_mtb_shopstore_group")
     * @ORM\InheritanceType("SINGLE_TABLE")
     * @ORM\DiscriminatorColumn(name="discriminator_type", type="string", length=255)
     * @ORM\HasLifecycleCallbacks()
     * @ORM\Entity(repositoryClass="Customize\Repository\ShopStoreGroupRepository")
     */
    class ShopStoreGroup extends \Eccube\Entity\AbstractEntity
    {
        /**
         * @return string
         */
        public function __toString()
        {
            return (string) $this->getName();
        }

        
        /**
         * @var int
         *
         * @ORM\Column(name="id", type="integer", options={"unsigned":true})
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="IDENTITY")
         */
        private $id;


        /**
         * @var \Eccube\Entity\Product
         *
         * @ORM\ManyToOne(targetEntity="Eccube\Entity\Product", inversedBy="ShopStoreGroup")
         * @ORM\JoinColumns({
         * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
         * })
         */
        private $Product;


        /**
         * @var string
         *
         * @ORM\Column(name="name", type="string", length=255)
         */
        private $name;

        /**
         * @var int
         *
         * @ORM\Column(name="sort_no", type="smallint", options={"unsigned":true})
         */
        private $sort_no;

        /**
         * Get id.
         *
         * @return Id
         */
        public function getId()
        {
            return $this->id;
        }

        
        /**
         * Set product.
         *
         * @param \Eccube\Entity\Product|null $product
         *
         * @return ProductTag
         */
        public function setProduct(Product $product = null)
        {
            $this->Product = $product;

            return $this;
        }

        /**
         * Get product.
         *
         * @return \Eccube\Entity\Product|null
         */
        public function getProduct()
        {
            return $this->Product;
        }

        
        /**
         * Get name
         *
         * @return name
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * Set name
         *
         * @return this
         */
        public function setName($name)
        {
            $this->name = $name;
            return $this;
        }

        /**
         * Get sort_no.
         *
         * @return int
         */
        public function getSortNo()
        {
            return $this->sort_no;
        }

        /**
         * Set sort_no.
         *
         * @param int $sort_no
         * @return this
         */
        public function setSortNo($sort_no)
        {
            $this->sort_no = $sort_no;
            return $this;
        }

    }
}
?>