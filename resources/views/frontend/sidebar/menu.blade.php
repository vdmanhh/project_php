<div class="side-menu animate-dropdown outer-bottom-xs">
                <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
                <nav class="yamm megamenu-horizontal">
                    <ul class="nav">
                        @php
                        $cates = App\Models\Category::latest()->get();

                        @endphp
                        @foreach($cates as $key)
                        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="{{$key->category_icon}} " style="margin-right: 12px;" aria-hidden="true"></i>

                                @if(session()->get('language') == 'korean')
                                {{$key->category_name_hin}}
                                @else
                                {{$key->category_name_en}}
                                @endif

                            </a>
                            <ul class="dropdown-menu mega-menu">
                                <li class="yamm-content">
                                    <div class="row">
                                        @php
                                        $subs = App\Models\SubCategory::where('category_id',$key->id)->get();

                                        @endphp
                                        @foreach($subs as $value)
                                        <div class="col-sm-12 col-md-3">
                                            <a href="{{route('category.page',$value->id)}}">

                                            <h2 class="title titlemenu">

                                                @if(session()->get('language') == 'korean')
                                                {{$value->subcategory_name_hin}}
                                                @else
                                                {{$value->subcategory_name_en}}
                                                @endif
                                            </h2>
                                            </a>
                                            <ul class="links list-unstyled">
                                                @php
                                                $subsubs = App\Models\SubSubCategory::where('subcategory_id',$value->id)->get();

                                                @endphp
                                                @foreach($subsubs as $values)
                                                <li><a href="{{route('subsubcategory.page',$values->id)}}">
                                                        @if(session()->get('language') == 'korean')
                                                        {{$values->subsubcategory_name_hin}}
                                                        @else
                                                        {{$values->subsubcategory_name_en}}
                                                        @endif
                                                    </a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endforeach

                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- /.yamm-content -->
                            </ul>
                            <!-- /.dropdown-menu -->
                        </li>
                        @endforeach

                        </li>

                        </li>

                        </li>

                    </ul>

                </nav>
                <!-- /.megamenu-horizontal -->
            </div>
