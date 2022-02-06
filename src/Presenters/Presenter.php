<?php

namespace WovoSchool\Menus\Presenters;

use WovoSchool\Menus\MenuItem;

abstract class Presenter implements PresenterInterface
{
    /**
     * Get open tag wrapper.
     *
     * @return string
     */
    public function getOpenTagWrapper(): string
    {
    }

    /**
     * Get close tag wrapper.
     *
     * @return string
     */
    public function getCloseTagWrapper(): string
    {
    }

    /**
     * Get menu tag without dropdown wrapper.
     *
     * @param \WovoSchool\Menus\MenuItem $item
     *
     * @return string
     */
    public function getMenuWithoutDropdownWrapper($item): string
    {
    }


    /**
     * Get child menu tag without dropdown wrapper.
     *
     * @param MenuItem $item
     *
     * @return string
     */
    public function getChildMenuWithoutDropdownWrapper(MenuItem $item): string
    {
    }

    /**
     * Get divider tag wrapper.
     *
     * @return string
     */
    public function getDividerWrapper(): string
    {
    }

    /**
     * Get header dropdown tag wrapper.
     *
     * @param \WovoSchool\Menus\MenuItem $item
     *
     * @return string
     */
    public function getHeaderWrapper($item): string
    {
    }

    /**
     * Get menu tag with dropdown wrapper.
     *
     * @param \WovoSchool\Menus\MenuItem $item
     *
     * @return string
     */
    public function getMenuWithDropDownWrapper($item): string
    {
    }

    /**
     * Get multi level dropdown menu wrapper.
     *
     * @param \WovoSchool\Menus\MenuItem $item
     *
     * @return string
     */
    public function getMultiLevelDropdownWrapper($item): string
    {
    }

    /**
     * Get child menu items.
     *
     * @param \WovoSchool\Menus\MenuItem $item
     *
     * @return string
     */
    public function getChildMenuItems(MenuItem $item): string
    {
        $results = '';
        foreach ($item->getChilds() as $child) {
            if ($child->hidden()) {
                continue;
            }

            if ($child->hasSubMenu()) {
                $results .= $this->getMultiLevelDropdownWrapper($child);
            } elseif ($child->isHeader()) {
                $results .= $this->getHeaderWrapper($child);
            } elseif ($child->isDivider()) {
                $results .= $this->getDividerWrapper();
            } else {
                $results .= $this->getChildMenuWithoutDropdownWrapper($child);
            }
        }

        return $results;
    }
}
