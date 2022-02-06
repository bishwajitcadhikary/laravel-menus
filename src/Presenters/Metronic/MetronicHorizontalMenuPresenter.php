<?php

/*
 * Horizontal Menu for Metronic by KeenThemes (https://keenthemes.com/metronic/)
 * Author: Bishwajit Adhikary (bishwajitcadhikary@gmail.com)
 * Description: Generate horizontal menu to metronic theme
 */

namespace WovoSchool\Menus\Presenters\Metronic;

use WovoSchool\Menus\MenuItem;
use WovoSchool\Menus\Presenters\Presenter;

class MetronicHorizontalMenuPresenter extends Presenter
{
    /**
     * {@inheritdoc }
     */
    public function getOpenTagWrapper(): string
    {
        return PHP_EOL . '<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">' . PHP_EOL;
    }

    /**
     * {@inheritdoc }
     */
    public function getCloseTagWrapper(): string
    {
        return PHP_EOL . '</div>' . PHP_EOL;
    }

    /**
     * {@inheritdoc }
     */
    public function getMenuWithoutDropdownWrapper($item): string
    {
        return PHP_EOL . '<div class="menu-item">
                        <a class="menu-link ' . $this->getActiveState($item) . ' " href="' . $item->getUrl() . '">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-2">' . $item->icon . '</span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">' . $item->title . '</span>
                        </a>
                    </div>' . PHP_EOL;

    }

    public function getChildMenuWithoutDropdownWrapper(MenuItem $item): string
    {
        return PHP_EOL . '<div class="menu-item">
                            <a class="menu-link ' . $this->getActiveState($item) . ' " href="' . $item->getUrl() . '">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">' . $item->title . '</span>
                            </a>
                        </div>' . PHP_EOL;
    }

    /**
     * {@inheritdoc }
     */
    public function getActiveState($item): ?string
    {
        return \Request::is($item->getRequest()) ? 'active' : null;
    }

    /**
     * {@inheritdoc }
     */
    public function getActiveStateFromChild(MenuItem $item): ?string
    {
        return $item->getActiveStateFromChilds() ? 'here show' : null;
    }

    /**
     * {@inheritdoc }
     */
    public function getDividerWrapper(): string
    {
        return '';
    }

    /**
     * {@inheritdoc }
     */
    public function getMenuWithDropDownWrapper($item): string
    {
        return PHP_EOL . '<div data-kt-menu-trigger="click" class="menu-item '.$this->getActiveStateFromChild($item).' menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
											<span class="svg-icon svg-icon-2">' . $item->icon . '</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">' . $item->title . '</span>
										<span class="menu-arrow"></span>
									</span>
									<div class="menu-sub menu-sub-accordion menu-active-bg">
										' . $this->getChildMenuItems($item) . '
									</div>
								</div>' . PHP_EOL;
    }

    public function getMultiLevelDropdownWrapper($item): string
    {
        return '<li class="m-menu__item  m-menu__item--submenu"  data-menu-submenu-toggle="hover" data-redirect="true" aria-haspopup="true">
                            <a  href="#" class="m-menu__link m-menu__toggle">
                                ' . $item->getIcon() . '
                                <span class="m-menu__link-text">
                                    ' . $item->title . '
                                </span>
                                <i class="m-menu__hor-arrow la la-angle-right"></i>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                                <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                <ul class="m-menu__subnav">
                                    ' . $this->getChildMenuItems($item) . '
                                </ul>
                            </div>
                        </li>' . PHP_EOL;
    }
}
