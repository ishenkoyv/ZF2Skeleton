<?php

namespace Core\Pomm\Zf2skeleton\PublicSchema;

use PommProject\ModelManager\Model\Model;
use PommProject\ModelManager\Model\Projection;
use PommProject\ModelManager\Model\ModelTrait\WriteQueries;

use PommProject\Foundation\Where;

use Core\Pomm\Zf2skeleton\PublicSchema\AutoStructure\Page as PageStructure;
use Core\Pomm\Zf2skeleton\PublicSchema\Page;

/**
 * PageModel
 *
 * Model class for table page.
 *
 * @see Model
 */
class PageModel extends Model
{
    use WriteQueries;

    /**
     * __construct()
     *
     * Model constructor
     *
     * @access public
     */
    public function __construct()
    {
        $this->structure = new PageStructure;
        $this->flexible_entity_class = '\Core\Pomm\Zf2skeleton\PublicSchema\Page';
    }
}
