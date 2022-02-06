<?php

namespace WovoSchool\Menus\Presenters;

use WovoSchool\Menus\MenuItem;

interface PresenterInterface
{
    /**
     * Get open tag wrapper.
     *
     * @return string
     */
    public function getOpenTagWrapper(): string;

    /**
     * Get close tag wrapper.
     *
     * @return string
     */
    public function getCloseTagWrapper(): string;

    /**
     * Get menu tag without dropdown wrapper.
     *
     * @param \WovoSchool\Menus\MenuItem $item
     *
     * @return string
     */
    public function getMenuWithoutDropdownWrapper(MenuItem $item): string;

    /**
     * Get child menu tag without dropdown wrapper.
     *
     * @param \WovoSchool\Menus\MenuItem $item
     *
     * @return string
     */
    public function getChildMenuWithoutDropdownWrapper(MenuItem $item): string;

    /**
     * Get divider tag wrapper.
     *
     * @return string
     */
    public function getDividerWrapper(): string;

    /**
     * Get divider tag wrapper.
     *
     * @param \WovoSchool\Menus\MenuItem $item
     *
     * @return mixed
     */
    public function getHeaderWrapper(MenuItem $item): mixed;

    /**
     * Get menu tag with dropdown wrapper.
     *
     * @param \WovoSchool\Menus\MenuItem $item
     *
     * @return string
     */
    public function getMenuWithDropDownWrapper(MenuItem $item): string;

    /**
     * Get child menu items.
     *
     * @param \WovoSchool\Menus\MenuItem $item
     *
     * @return string
     */
    public function getChildMenuItems(MenuItem $item): string;
}
