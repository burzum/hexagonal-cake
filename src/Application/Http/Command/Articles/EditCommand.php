<?php
declare(strict_types = 1);

namespace App\Application\Http\Command\Articles;

use App\Application\Http\Command\AbstractCommand;

/**
 * AddCommand
 */
class EditCommand extends AbstractCommand
{
    public function getQueryParams()
    {
        return $this->getRequest()->getQueryParams();
    }
}
