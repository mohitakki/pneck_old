
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="active"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="la la-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          <?php
          $user=Auth::guard('admin')->user();
          $menus=$user->menus;
          $sidebarid=Session('sidebarid');
                 
          ?>
          
          <?php if($user->role_type == '1'): ?>
        
                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($menu->menu_parent == '0' &&  $menu->menu_status == '1'): ?>
                      <li class=" nav-item"><a href="#"><i class="<?php echo e(($menu->menu_icon)); ?>"></i><span class="menu-title" data-i18n="nav.invoice.main"><?php echo e($menu->menu_name); ?></span></a>
                        
                          <?php if(count($menu->sub_menus) != '0'): ?>
                          <ul>
                            <?php $__currentLoopData = $menu->sub_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($submenu->menu_status == '1'): ?>
                                  <li class="nav-item <?php if($submenu->id == $sidebarid): ?> active <?php endif; ?> "><a <?php if($submenu->menu_link != ''): ?> href="<?php echo e(route($submenu->menu_link)); ?>" <?php else: ?> href="#" <?php endif; ?>><i class="<?php echo e(( $submenu->menu_icon)); ?>"></i><span class="menu-title" data-i18n="nav.invoice.main"><?php echo e($submenu->menu_name); ?></span></a>
                                    <?php if(count($submenu->sub_menus) != '0'): ?>
                                        <ul>
                                            <?php $__currentLoopData = $submenu->sub_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsubmenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($subsubmenu->menu_status == '1'): ?>
                                                    <li class="nav-item <?php if($subsubmenu->id == $sidebarid): ?> active <?php endif; ?> "><a <?php if($subsubmenu->menu_link != ''): ?> href="<?php echo e(route($subsubmenu->menu_link)); ?>" <?php else: ?> href="#" <?php endif; ?>><i class="<?php echo e(($subsubmenu->menu_icon)); ?>"></i><span class="menu-title" data-i18n="nav.invoice.main"><?php echo e($subsubmenu->menu_name); ?></span></a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                  </li>
                              <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                          <?php endif; ?>
                
                      </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            
                <?php $__currentLoopData = $user->adminuser_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adminuser_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($adminuser_menu->menu_parent == '0' &&  $adminuser_menu->menu_status == '1'): ?>
                      <li class="nav-item"><a href="#"><i class="<?php echo e(($adminuser_menu->menu_icon)); ?>"></i><span class="menu-title" data-i18n="nav.invoice.main"><?php echo e($adminuser_menu->menu_name); ?></span></a>
                        <?php if(count($adminuser_menu->adminuser_sub_menus($user->role_type)) != '0'): ?>
                          <ul>
                            <?php $__currentLoopData = $adminuser_menu->adminuser_sub_menus($user->role_type); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($submenu->menu_status == '1'): ?>
                                  <li class="nav-item"><a <?php if($submenu->menu_link != ''): ?> href="<?php echo e(route($submenu->menu_link)); ?>" <?php else: ?> href="#" <?php endif; ?>><i class="<?php echo e(($submenu->menu_icon)); ?>"></i><span class="menu-title" data-i18n="nav.invoice.main"><?php echo e($submenu->menu_name); ?></span></a>
                                    <?php if(count($submenu->adminuser_sub_menus($user->role_type)) != '0'): ?>
                                        <ul>
                                            <?php $__currentLoopData = $submenu->adminuser_sub_menus($user->role_type); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsubmenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($subsubmenu->menu_status == '1'): ?>
                                                    <li class=" nav-item"><a <?php if($subsubmenu->menu_link != ''): ?> href="<?php echo e(route($subsubmenu->menu_link)); ?>" <?php else: ?> href="#" <?php endif; ?>><i class="<?php echo e(($subsubmenu->menu_icon)); ?>"></i><span class="menu-title" data-i18n="nav.invoice.main"><?php echo e($subsubmenu->menu_name); ?></span></a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                  </li>
                              <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                        <?php endif; ?>
                      </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </ul>
      </div><?php /**PATH /Volumes/mydata/pneck_backend-master/resources/views/admin/includes/sidebar.blade.php ENDPATH**/ ?>