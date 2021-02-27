  <div class="sidebar">
                          <!-- Start Фильтер цены -->
                        <div class="sidebar__widget gray-bg ">
                            <div class="sidebar__box">
                                <h5 class="sidebar__title">Price</h5>
                            </div>
                            <div class="sidebar__price-filter ">
                                <div id="slider-range" class="price-filter-range"></div>
                                <div class="slider__price-filter-input d-flex justify-content-between">
                                    <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" />
                                    <input type="number" min=0 max="10000" oninput="validity.valid||(value='1000');" id="max_price" class="price-range-field" />
                                </div>
                            </div>
                        </div>  <!-- End Фильтер цены  -->

                        <!-- Start Основной фильтер товаров  -->
                        <div class="sidebar__widget gray-bg">
                            <div class="sidebar__box">
                                <h5 class="sidebar__title">Filter By</h5>
                                <a href="" class="btn btn--box btn--blue btn--small"><i class="far fa-times"></i> Clear All</a>
                            </div>
                            <div class="sidebar__box m-t-40">
                                <h5 class="sidebar__title">Fashion</h5>
                            </div>
                            <ul class="sidebar__menu-filter ">

                                 <!-- Start Single Menu Filter List -->
                                <li class="sidebar__menu-filter-list">
                                    <label for="men"><input type="checkbox" name="gender" value="Men" id="men"><span>Men</span></label>
                                </li>  <!-- End Single Menu Filter List -->

                                <li class="sidebar__menu-filter-list">
                                    <label for="women"><input type="checkbox" name="gender" value="women" id="women"><span>Women</span></label>
                                </li>  <!-- End Single Menu Filter List -->

                                <li class="sidebar__menu-filter-list">
                                    <label for="kids"><input type="checkbox" name="gender" value="kids" id="kids"><span>Kids</span></label>
                                </li>  <!-- End Single Menu Filter List -->

                            </ul>

                            <div class="sidebar__box m-t-40">
                                <h5 class="sidebar__title">Brand</h5>
                            </div>
                            <ul class="sidebar__menu-filter ">
                                 <!-- Start Single Menu Filter List -->
                                <li class="sidebar__menu-filter-list">
                                    <label for="graphic-corner"><input type="checkbox" name="brand" value="graphic-corner" id="graphic-corner"><span>Graphic Corner</span></label>
                                </li>  <!-- End Single Menu Filter List -->
                                <li class="sidebar__menu-filter-list">
                                    <label for="studio-design"><input type="checkbox" name="brand" value="studio-design" id="studio-design"><span>Studio Design</span></label>
                                </li>  <!-- End Single Menu Filter List -->
                            </ul>
                        </div>  <!-- End Основной фильтер товаров --> 
                    </div>