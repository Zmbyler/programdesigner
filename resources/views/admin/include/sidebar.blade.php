<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item {{ (request()->segment(2) == 'dashboard') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{route('admin.dashboard.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon"><i class="fa fa-home" aria-hidden="true"></i>
                </span><span class="kt-menu__link-text">Dashboard</span></a></li>
            

                <li class="kt-menu__item  kt-menu__item--submenu {{\Request::is('admin/users*') ? 'kt-menu__item--open kt-menu__item--active' : ''}}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><i class="fa fa-users" aria-hidden="true"></i>
                </span><span class="kt-menu__link-text">User Management</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">User Management</span></span></li>
                            <li class="kt-menu__item {{ (request()->segment(2) == 'users') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                                <a href="{{route('users.index')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Coaches</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Clients</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

            <li class="kt-menu__item {{ (request()->segment(2) == 'category') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{route('category.index')}}" class="kt-menu__link ">
                <span class="kt-menu__link-icon">
                    <i class="fa fa-list-alt" aria-hidden="true"></i></span><span class="kt-menu__link-text">Category</span></a>
            </li>
            <li class="kt-menu__item {{ (request()->segment(2) == 'cms') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{route('cms.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
                <i class="fa fa-file" aria-hidden="true"></i></span><span class="kt-menu__link-text">Cms</span></a>
            </li>
            <li class="kt-menu__item {{ (request()->segment(2) == 'blockfocus') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{route('blockfocus.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
                        <i class="fa fa-file" aria-hidden="true"></i></span><span class="kt-menu__link-text">Block Focus</span></a>
            </li>
            <li class="kt-menu__item {{ (request()->segment(2) == 'athlete') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{route('athlete.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
                        <i class="fa fa-file" aria-hidden="true"></i></span><span class="kt-menu__link-text">Athlete Profile</span></a>
            </li>
             <li class="kt-menu__item {{ (request()->segment(2) == 'trainingage') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{route('trainingage.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
                        <i class="fa fa-file" aria-hidden="true"></i></span><span class="kt-menu__link-text">Training Age</span></a>
            </li>
           {{--  <li class="kt-menu__item {{ (request()->segment(2) == 'sport') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{route('sport.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
                        <i class="fa fa-file" aria-hidden="true"></i></span><span class="kt-menu__link-text">Sport</span></a>
            </li> --}}
            <li class="kt-menu__item {{ (request()->segment(2) == 'training') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{route('training.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
                <i class="fa fa-file" aria-hidden="true"></i></span><span class="kt-menu__link-text">Training</span></a>
            </li>

           
            <li class="kt-menu__item {{ (request()->segment(2) == 'assessmentResult') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{route('assessmentResult.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
                <i class="fa fa-file" aria-hidden="true"></i></span><span class="kt-menu__link-text">Assessment Result</span></a>
            </li>
            
            <li class="kt-menu__item {{ (request()->segment(2) == 'assessmentCategory') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{route('assessmentCategory.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
                        <i class="fa fa-file" aria-hidden="true"></i></span><span class="kt-menu__link-text">Assessment Category</span></a>
            </li>




            <li class="kt-menu__item  kt-menu__item--submenu {{\Request::is('admin/exercise*') ? 'kt-menu__item--open kt-menu__item--active' : ''}}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><i class="fa fa-users" aria-hidden="true"></i>
                </span><span class="kt-menu__link-text">Exercise</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Exercise</span></span></li>
                       <li class="kt-menu__item {{ (request()->segment(2) == 'exercise') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="{{route('exercise.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
                            <i class="fa fa-file" aria-hidden="true"></i></span><span class="kt-menu__link-text">List</span></a>
                        </li>
                       <li class="kt-menu__item  {{ \Request::is('admin/exercise/import/create') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                        <a href="{{route('exportImport.create.exercise')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
                            <i class="fa fa-file" aria-hidden="true"></i></span><span class="kt-menu__link-text">Import</span>
                        </a></li>

                    </ul>
                </div>
            </li>

            <li class="kt-menu__item  kt-menu__item--submenu {{\Request::is('admin/programtemplate*') ? 'kt-menu__item--open kt-menu__item--active' : ''}}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><i class="fa fa-users" aria-hidden="true"></i>
                </span><span class="kt-menu__link-text">Program Template</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Program Template</span></span></li>
                           <li class="kt-menu__item {{ (request()->segment(2) == 'programtemplate') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                                <a href="{{route('programtemplate.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
                                <i class="fa fa-file" aria-hidden="true"></i></span><span class="kt-menu__link-text">List</span></a>
                            </li>
                            <li class="kt-menu__item  {{ \Request::is('admin/programtemplate/import/create') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="{{route('exportImport.create.program_template')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
                                <i class="fa fa-file" aria-hidden="true"></i></span><span class="kt-menu__link-text">Import</span>
                            </a></li>

                        </ul>
                    </div>
                </li>


            
            <!-- program -->
            <li class="kt-menu__item  {{ (request()->segment(2) == 'program') ? 'kt-menu__item--open kt-menu__item--active' : '' }} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><i class="fa fa-file" aria-hidden="true"></i></span><span class="kt-menu__link-text">Template</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Template</span></span></li>
                        @foreach($templates as $template)
                        @if(count($template->programgoal) > 0)
                        <li class="kt-menu__item  kt-menu__item--submenu {{(\Request::query('template_id')==$template->id) ? 'kt-menu__item--open' : (\Request::query('program_id') ? 'kt-menu__item--open' : '')}}" aria-haspopup="true">
                            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">{{$template->name}}</span>
                                @if($template->programgoal)
                                <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                @endif
                            </a>

                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    @foreach($template->programgoal as $program)
                                    <li class="kt-menu__item {{(\Request::query('program_id')==$program->id) ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                        <a href="{{route('program.index',['program_id'=>$program->id])}}" class="kt-menu__link ">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                            <span class="kt-menu__link-text">{{$program->name}}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        @else
                        <li class="kt-menu__item {{(\Request::query('template_id')==$template->id) ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                            <a href="{{route('program.index',['template_id'=>$template->id])}}" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">{{$template->name}}</span>
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item {{ (request()->segment(2) == 'plan') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{route('plan.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
                        <i class="fa fa-file" aria-hidden="true"></i></span><span class="kt-menu__link-text">Plan Management</span></a></li>

            {{-- <li class="kt-menu__item {{ (request()->segment(2) == 'blockfocus') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{route('blockfocus.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect id="bound" x="0" y="0" width="24" height="24" />
                                <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
                                <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" id="Combined-Shape" fill="#000000" />
                                <rect id="Rectangle-152" fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1" />
                                <rect id="Rectangle-152-Copy-2" fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1" />
                                <rect id="Rectangle-152-Copy-3" fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1" />
                                <rect id="Rectangle-152-Copy" fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1" />
                                <rect id="Rectangle-152-Copy-5" fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1" />
                                <rect id="Rectangle-152-Copy-4" fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1" />
                            </g>
                        </svg></span><span class="kt-menu__link-text">Block Focus</span></a></li> --}}
            {{-- <li class="kt-menu__item {{ (request()->segment(2) == 'program') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
            <a href="{{route('program.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect id="bound" x="0" y="0" width="24" height="24" />
                            <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
                            <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" id="Combined-Shape" fill="#000000" />
                            <rect id="Rectangle-152" fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1" />
                            <rect id="Rectangle-152-Copy-2" fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1" />
                            <rect id="Rectangle-152-Copy-3" fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1" />
                            <rect id="Rectangle-152-Copy" fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1" />
                            <rect id="Rectangle-152-Copy-5" fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1" />
                            <rect id="Rectangle-152-Copy-4" fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1" />
                        </g>
                    </svg></span><span class="kt-menu__link-text">Fat Loss Template</span></a></li> --}}
            <!-- contact us -->
            <li class="kt-menu__item  kt-menu__item--submenu {{(\Request::is('admin/contact') || \Request::is('admin/contactpage')) ? 'kt-menu__item--open kt-menu__item--active' : ''}}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                        <i class="fa fa-file" aria-hidden="true"></i></span><span class="kt-menu__link-text">Contact Us</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Contact us</span></span></li>
                        <li class="kt-menu__item  {{ \Request::is('admin/contact') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="{{route('contact.index')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Listing</span>
                            </a></li>
                        <li class="kt-menu__item  {{ \Request::is('admin/contactpage') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="{{route('contactpage')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Static Text</span>
                            </a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
