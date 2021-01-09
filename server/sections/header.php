    <header>
        <div class="logo">
            ABCDE
        </div>

        <!-- desktop menu here-->
        <div class="desktop-menu">
                <?php $class = '';?>
                <?php for($i =0 ; $i< count($menuItems);$i++):?>
                    <?php  if(count($menuItems[$i]) > 2) $class = $menuItems[$i][2];?>
                    <li class='desktop-menu-list-item  <?=$class?>'>
                        <a href='<?=$menuItems[$i][1]?>' class='smooth-scroll'>
                            <?=$menuItems[$i][0]?>
                        </a>
                    </li>
                <?php endfor;?>
        </div>

        <!-- mobile menu here -->
        <div class="mobile-menu">
            <div class="menu-icon">
                <?php echo $menuIcon ;?>
            </div>
            <div class="mobile-menu-list">
                <li class="mobile-menu-list-item close-btn"><button><?=$menuCloseIcon;?></button></li>

                <?php $class = '';?>
                <?php for($i =0 ; $i< count($menuItems);$i++):?>
                    <?php  if(count($menuItems[$i])>2) $class = $menuItems[$i][2];?>
                    <li class='mobile-menu-list-item'>
                        <a href='<?=$menuItems[$i][1]?>' class='smooth-scroll <?=$class?>'>
                            <?=$menuItems[$i][0]?>
                        </a>
                    </li>
                <?php endfor;?>
            </div>            
        </div>

    </header>