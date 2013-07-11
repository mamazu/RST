<?php

namespace Gregwar\RST\HTML\References;

use Gregwar\RST\Reference;
use Gregwar\RST\Environment;

class Doc extends Reference
{
    public function getName()
    {
        return 'doc';
    }

    public function resolve(Environment $environment, $data)
    {
        $metas = $environment->getMetas();
        $file = $environment->canonicalUrl($data);

        if ($metas) {
            $entry = $metas->get($file);
            $entry['url'] = $environment->relativeUrl('/'.$entry['url']);
        } else {
            $entry = array(
                'title' => '(unresolved)',
                'url' => '#'
            );
        }

        return $entry;
    }

    public function found(Environment $environment, $data)
    {
        $environment->addDependency($data);
    }
}