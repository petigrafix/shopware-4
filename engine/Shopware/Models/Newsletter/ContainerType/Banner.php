<?php
/**
 * Shopware 4.0 - Dispatch
 * Copyright © 2012 shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 *
 * @category   Shopware
 * @package    Shopware_Models
 * @subpackage Backend, Newsletter/ContainerType
 * @copyright  Copyright (c) 2012, shopware AG (http://www.shopware.de)
 * @version    $Id$
 * @author     Daniel Nögel
 * @author     $Author$
 */

namespace   Shopware\Models\Newsletter\ContainerType;
use         Shopware\Components\Model\ModelEntity,
            Doctrine\ORM\Mapping AS ORM;

/**
 * Shopware text model represents a banner container type.
 *
 * @ORM\Entity(repositoryClass="Repository")
 * @ORM\Table(name="s_campaigns_banner")
 */
class Banner extends ModelEntity
{
    /**
     * Autoincrement ID
     *
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * ID of the container this model belongs to
     *
     * @var integer $containerId
     *
     * @ORM\Column(name="parentID", type="integer", length=11, nullable=true)
     */
    private $containerId = null;

    /**
     * OWNING SIDE
     * Owning side of relation between container type 'article' and parent container
     *
     * @ORM\OneToOne(targetEntity="Shopware\Models\Newsletter\Container", inversedBy="banner")
     * @ORM\JoinColumn(name="parentID", referencedColumnName="id")
     * @var \Shopware\Models\Newsletter\Container
     */
    protected $container;

    /**
     * Image of the banner
     * @var string $image
     *
     * @ORM\Column(name="image", type="string", nullable=false)
     */
    private $image;

    /**
     * link of the banner
     * @var string $link
     *
     * @ORM\Column(name="link", type="string", nullable=false)
     */
    private $link;

    /**
     * Link target, e.g. _blank / _parent
     * @var string $target
     *
     * @ORM\Column(name="linkTarget", type="string", nullable=false)
     */
    private $target;

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $target
     */
    public function setTarget($target)
    {
        $this->target = $target;
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", nullable=false)
     */
    private $description;


    /**
     * @param \Shopware\Models\Newsletter\Container $container
     * @return \Shopware\Models\Newsletter\Container
     */
    public function setContainer($container)
    {
        $this->container = $container;
        $container->setType('ctBanner');
//        return $this->setOneToOne($container, '\Shopware\Models\Newsletter\Container', 'container', 'banner');
    }

    /**
     * @return \Shopware\Models\Newsletter\Container
     */
    public function getContainer()
    {
        return $this->container;
    }
}

