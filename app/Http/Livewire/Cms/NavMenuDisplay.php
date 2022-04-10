<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;

use App\CmsNavMenuItem;

class NavMenuDisplay extends Component
{
    public $cmsNavMenu;

    public $modes = [
        'createNavMenuItem' =>false,
    ];

    protected $listeners = [
        'cmsNavMenuItemAdded',
        'exitCreateCmsNavMenuItemMode',
    ];

    public function render()
    {
        return view('livewire.cms.nav-menu-display');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    public function cmsNavMenuItemAdded()
    {
        $this->exitMode('createNavMenuItem');
    }

    public function exitCreateCmsNavMenuItemMode()
    {
        $this->exitMode('createNavMenuItem');
    }

    public function moveUp(CmsNavMenuItem $cmsNavMenuItem)
    {
        /* Skip for first item */
        if ($cmsNavMenuItem->order == 1) {
            return;
        }

        $beforeItem = $this->getBeforeItem($cmsNavMenuItem);

        $temp = $beforeItem->order;
        $beforeItem->order = $cmsNavMenuItem->order;
        $cmsNavMenuItem->order = $temp;

        $beforeItem->save();
        $cmsNavMenuItem->save();

        $this->render();
    }

    public function moveDown(CmsNavMenuItem $cmsNavMenuItem)
    {
        /* Skip for last item */
        if ($cmsNavMenuItem->order == $cmsNavMenuItem->cmsNavMenu->cmsNavMenuItems()->orderBy('order', 'desc')->first()->order) {
            return;
        }

        $nextItem = $this->getNextItem($cmsNavMenuItem);

        $temp = $nextItem->order;
        $nextItem->order = $cmsNavMenuItem->order;
        $cmsNavMenuItem->order = $temp;

        $nextItem->save();
        $cmsNavMenuItem->save();

        $this->render();
    }

    public function getBeforeItem(CmsNavMenuItem $cmsNavMenuItem)
    {
        $beforeItem = $cmsNavMenuItem->cmsNavMenu
            ->cmsNavMenuItems()->where('order', '<', $cmsNavMenuItem->order)
            ->orderBy('order', 'desc')
            ->first();

        return $beforeItem;
    }

    public function getNextItem(CmsNavMenuItem $cmsNavMenuItem)
    {
        $nextItem = $cmsNavMenuItem->cmsNavMenu
            ->cmsNavMenuItems()->where('order', '>', $cmsNavMenuItem->order)
            ->orderBy('order', 'asc')
            ->first();

        return $nextItem;
    }
}
