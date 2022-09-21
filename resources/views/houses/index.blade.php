@extends('.layouts.master')

@section("page-top")
    <nav class="page-breadcrumb" itemprop="breadcrumb">
        <a href="/">Главная</a>
        <!--<span class="breadcrumb-separator"> > </span>!-->
    </nav>
    <div class="page-top__switchers">

        <div class="container">
            <div class="row">

                <div class="page-top__switchers-inner">

                    <a href="#" class="page-top__filter">
                        <span class="icon-filter"></span>
                        Фильтры
                    </a>

                    <a href="#" data-tab-name="loop" class="page-top__switcher tab-nav active">
                        <span class="icon-grid"></span>
                    </a>

                    <a href="#" data-tab-name="map" class="page-top__switcher tab-nav">
                        <span class="icon-marker"></span>
                    </a>

                </div>

            </div>
        </div>

    </div>
@endsection

@section("content")
    <div class="page-content">
        <h1 class="visuallyhidden">Новостройки</h1>

        <div class="page-loop__wrapper loop tab-content tab-content__active">

            <ul class="page-loop with-filter">
                @foreach($houses as $house)
                    <li class="page-loop__item wow animate__animated animate__fadeInUp" data-wow-duration="0.8s">

                        <a href="#" class="favorites-link favorites-link__add" title="Добавить в Избранное"
                           role="button">
                            <span class="icon-heart"><span class="path1"></span><span class="path2"></span></span>
                        </a>

                        <a href="{{ url('/house/'.$house->id) }}" class="page-loop__item-link">

                            <div class="page-loop__item-image">

                                <img src="{{ $house->image_path_preview }}" alt="">

                                <div class="page-loop__item-badges">
                                    <span class="badge">Услуги 0%</span>
                                    @if($house->class)
                                        <span class="badge">{{ $house->class->name }}</span>
                                    @endif
                                </div>

                            </div>

                            <div class="page-loop__item-info">

                                <h3 class="page-title-h3">{{ $house->name }}</h3>

                                <p class="page-text">Срок сдачи до {{ $house->getTerm() }}</p>

                                <div class="page-text to-metro">
                                    <span class="icon-metro icon-metro--red"></span>
                                    <span class="page-text">Студенческая <span> 5 мин.</span></span>
                                    <span class="icon-walk-icon"></span>
                                </div>

                                <span class="page-text text-desc">{{ $house->address }}</span>

                            </div>

                        </a>

                    </li>
                @endforeach
            </ul>

            <div class="show-more">

                <button class="show-more__button">

                    <span class="show-more__button-icon"></span>

                    Показать еще

                </button>

            </div>

        </div>

        <div class="page-map tab-content map">

            <h1>Тут будет карта</h1>

        </div>
    </div>

    <div class="page-filter fixed">

        <div class="page-filter__wrapper">

            <form id="page-filter" class="page-filter__form">

                <div class="page-filter__body">

                    <div class="page-filter__category">

                        <a href="#proximity" class="page-filter__category-link" data-toggle="collapse">
                            <h3 class="page-title-h3">Близость к метро</h3>
                            <svg width="13" height="8" viewBox="0 0 13 8" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.036 0.611083L0.191897 6.45712C-0.0639745 6.71364 -0.0639745 7.12925 0.191897 7.38642C0.44777 7.64294 0.863375 7.64294 1.11925 7.38642L6.49964 2.00408L11.88 7.38577C12.1359 7.64229 12.5515 7.64229 12.808 7.38577C13.0639 7.12925 13.0639 6.713 12.808 6.45648L6.96399 0.610435C6.71076 0.357856 6.28863 0.357856 6.036 0.611083Z"
                                    fill="#111111"/>
                            </svg>
                        </a>

                        <div class="page-filter__category-list collapse show" id="proximity">
                            <ul class="proximity">
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="<10" id="less10">
                                        <label for="less10">&lt;10</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="10-20" id="10-20">
                                        <label for="10-20">10-20</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="20-40" id="20-40">
                                        <label for="20-40">20-40</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="40+" id="more40">
                                        <label for="more40">40+</label>
                                    </div>
                                </li>
                                <li class="w-100">
                                    <div class="checkbox">
                                        <input type="checkbox" name="any" id="any" checked>
                                        <label for="any">Любой</label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="page-filter__category">

                        <a href="#deadline" class="page-filter__category-link" data-toggle="collapse">
                            <h3 class="page-title-h3">Срок сдачи</h3>
                            <svg width="13" height="8" viewBox="0 0 13 8" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.036 0.611083L0.191897 6.45712C-0.0639745 6.71364 -0.0639745 7.12925 0.191897 7.38642C0.44777 7.64294 0.863375 7.64294 1.11925 7.38642L6.49964 2.00408L11.88 7.38577C12.1359 7.64229 12.5515 7.64229 12.808 7.38577C13.0639 7.12925 13.0639 6.713 12.808 6.45648L6.96399 0.610435C6.71076 0.357856 6.28863 0.357856 6.036 0.611083Z"
                                    fill="#111111"/>
                            </svg>
                        </a>

                        <div class="page-filter__category-list collapse show" id="deadline">
                            <ul class="deadline">
                                <li>
                                    <div class="radio">
                                        <input type="radio" name="deadline" id="all" value="all" checked>
                                        <label for="all">Любой</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="radio">
                                        <input type="radio" name="deadline" id="passed" value="passed">
                                        <label for="passed">Сдан</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="radio">
                                        <input type="radio" name="deadline" id="this-year" value="this-year">
                                        <label for="this-year">В этом году</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="radio">
                                        <input type="radio" name="deadline" id="next-year" value="next-year">
                                        <label for="next-year">В следующем году</label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="page-filter__category">

                        <a href="#housing" class="page-filter__category-link" data-toggle="collapse">
                            <h3 class="page-title-h3">Класс жилья</h3>
                            <svg width="13" height="8" viewBox="0 0 13 8" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.036 0.611083L0.191897 6.45712C-0.0639745 6.71364 -0.0639745 7.12925 0.191897 7.38642C0.44777 7.64294 0.863375 7.64294 1.11925 7.38642L6.49964 2.00408L11.88 7.38577C12.1359 7.64229 12.5515 7.64229 12.808 7.38577C13.0639 7.12925 13.0639 6.713 12.808 6.45648L6.96399 0.610435C6.71076 0.357856 6.28863 0.357856 6.036 0.611083Z"
                                    fill="#111111"/>
                            </svg>
                        </a>

                        <div class="page-filter__category-list collapse show" id="housing">
                            <ul class="housing">
                                @foreach($classes as $class)
                                    <li>
                                        <div class="checkbox">
                                            <input type="checkbox" name="{{ $class->name_trans }}"
                                                   id="{{ $class->name_trans }}">
                                            <label for="{{ $class->name_trans }}">{{ $class->name }}</label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    @if(count($generalOptions) > 0)
                    <div class="page-filter__category">

                        <a href="#general" class="page-filter__category-link" data-toggle="collapse">
                            <h3 class="page-title-h3">Основные опции</h3>
                            <svg width="13" height="8" viewBox="0 0 13 8" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.036 0.611083L0.191897 6.45712C-0.0639745 6.71364 -0.0639745 7.12925 0.191897 7.38642C0.44777 7.64294 0.863375 7.64294 1.11925 7.38642L6.49964 2.00408L11.88 7.38577C12.1359 7.64229 12.5515 7.64229 12.808 7.38577C13.0639 7.12925 13.0639 6.713 12.808 6.45648L6.96399 0.610435C6.71076 0.357856 6.28863 0.357856 6.036 0.611083Z"
                                    fill="#111111"/>
                            </svg>
                        </a>

                        <div class="page-filter__category-list collapse show" id="general">
                            <ul class="general">
                                @foreach($generalOptions as $option)
                                    <li>
                                        <div class="checkbox">
                                            <input type="checkbox" name="{{ $option->name_trans }}"
                                                   id="{{ $option->name_trans }}">
                                            <label for="{{ $option->name_trans }}">{{ $option->name }}</label>
                                            <span class="{{ $option->icon }}"></span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    @endif

                    @if(count($additionalOptions['main']) > 0)
                    <div class="page-filter__category">

                        <a href="#additional" class="page-filter__category-link" data-toggle="collapse">
                            <h3 class="page-title-h3">Дополнительные опции</h3>
                            <svg width="13" height="8" viewBox="0 0 13 8" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.036 0.611083L0.191897 6.45712C-0.0639745 6.71364 -0.0639745 7.12925 0.191897 7.38642C0.44777 7.64294 0.863375 7.64294 1.11925 7.38642L6.49964 2.00408L11.88 7.38577C12.1359 7.64229 12.5515 7.64229 12.808 7.38577C13.0639 7.12925 13.0639 6.713 12.808 6.45648L6.96399 0.610435C6.71076 0.357856 6.28863 0.357856 6.036 0.611083Z"
                                    fill="#111111"/>
                            </svg>
                        </a>

                        <div class="page-filter__category-list collapse show" id="additional">
                            <ul class="additional">
                                @foreach($additionalOptions['main'] as $option)
                                    <li>
                                        <div class="checkbox">
                                            <input type="checkbox" name="{{ $option->name_trans }}"
                                                   id="{{ $option->name_trans }}">
                                            <label for="{{ $option->name_trans }}">{{ $option->name }}</label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            @if(count($additionalOptions['other']) > 0)
                                <div class="collapse" id="additional_collapse">
                                    <ul class="additional additional__collapse">
                                        @foreach($additionalOptions['other'] as $option)
                                            <li>
                                                <div class="checkbox">
                                                    <input type="checkbox" name="{{ $option->name_trans }}"
                                                           id="{{ $option->name_trans }}">
                                                    <label for="{{ $option->name_trans }}">{{ $option->name }}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <a href="#additional_collapse" class="page-filter__category-more"
                                   data-toggle="collapse" data-count="{{ count($additionalOptions['other']) }}"
                                   role="button">Показать еще ({{ count($additionalOptions['other']) }})</a>
                            @endif
                        </div>

                    </div>
                    @endif

                    @if(count($servicesOptions) > 0)
                    <div class="page-filter__category service">
                        @foreach($servicesOptions as $option)
                            <div class="checkbox">
                                <input type="checkbox" name="{{ $option->name_trans }}" id="{{ $option->name_trans }}" checked>
                                <label for="{{ $option->name_trans }}"><span class="checkbox__box"></span>{{ $option->name }}</label>
                                <span class="tip tip-info" data-toggle="popover" data-placement="top"
                                      data-content="And here's some amazing content. It's very engaging. Right?">
						<span class="{{ $option->icon }}"></span>
					</span>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <div class="page-filter__buttons">

                    <button class="button button--pink w-100" type="submit" id="apply_filter">
                        Применить фильтры
                    </button>

                    <button class="button w-100" type="reset" id="reset_filter">Сбросить фильтры
                        <svg width="9" height="8" viewBox="0 0 9 8" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.5 0.942702L7.5573 0L4.49999 3.05729L1.4427 0L0.5 0.942702L3.55729 3.99999L0.5 7.0573L1.4427 8L4.49999 4.94271L7.55728 8L8.49998 7.0573L5.44271 3.99999L8.5 0.942702Z"/>
                        </svg>
                    </button>

                </div>

            </form>

        </div>

    </div>
@endsection
