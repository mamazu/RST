<?php

namespace Gregwar\RST\HTML;

use Gregwar\RST\Kernel as Base;

class Kernel extends Base
{
    function getName()
    {
        return 'HTML';
    }

    public function getDirectives()
    {
        $directives = parent::getDirectives();

        $directives = array_merge($directives, array(
            new Directives\Image,
            new Directives\Meta,
            new Directives\Stylesheet,
            new Directives\Title,
            new Directives\Url,
            new Directives\Wrap('note')
        ));

        return $directives;
    }

    public function getReferences()
    {
        return array(
            new References\Doc
        );
    }
    
    public function getFileExtension()
    {
        return 'html';
    }
}