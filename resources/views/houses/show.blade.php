@extends('.layouts.master')

@section('maps')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=f7f5866c-fcab-4da8-94d7-cdbdb39c7d22&lang=ru_RU"></script>
@endsection

@section('page-top')
    <nav class="page-breadcrumb" itemprop="breadcrumb">
        <a href="/">Главная</a>
        <span class="breadcrumb-separator"> > </span>
        {{ $house->name }}
    </nav>
@endsection

@section("content")
    <div class="page-content">
        <article class="post">

            <div class="post-header">

                <h1 class="page-title-h1">{{ $house->name }}</h1>

                <span>{{ $house->company }}</span>

                <div class="post-header__details">

                    <div class="address">{{ $house->address }}</div>

                    <div class="metro"><span class="icon-metro icon-metro--red"></span>Студенческая <span>5 мин.<span
                                class="icon-walk-icon"></span></span></div>

                    <div class="metro"><span class="icon-metro icon-metro--green"></span>Сокол <span>25 мин.<span
                                class="icon-bus"></span></span></div>

                    <div class="metro"><span class="icon-metro icon-metro--red"></span>Китай-Город <span>15 мин.<span
                                class="icon-bus"></span></span></div>

                </div>

            </div>

            <div class="post-image">

                <img src="{{ $house->image_path }}" alt="Расцветай на Маркса">

                <div class="page-loop__item-badges">
                    <span class="badge">Услуги 0%</span>
                    <span class="badge">Комфорт+</span>
                </div>

                <a href="#" class="favorites-link favorites-link__add" title="Добавить в Избранное" role="button">
                    <span class="icon-heart"><span class="path1"></span><span class="path2"></span></span>
                </a>

            </div>

            <h2 class="page-title-h1">Характеристики ЖК</h2>

            <ul class="post-specs">
                <li>
                    <span class="icon-building"></span>
                    <div class="post-specs__info">
                        <span>Класс жилья</span>
                        <p>Комфорт</p>
                    </div>
                </li>
                <li>
                    <span class="icon-brick"></span>
                    <div class="post-specs__info">
                        <span>Конструктив</span>
                        <p>Монолит-кирпич</p>
                    </div>
                </li>
                <li>
                    <span class="icon-paint"></span>
                    <div class="post-specs__info">
                        <span>Отделка</span>
                        <p>
                            Чистовая
                            <span class="tip tip-info" data-toggle="popover" data-placement="top"
                                  data-content="And here's some amazing content. It's very engaging. Right?">
						<span class="icon-prompt"></span>
					</span>
                        </p>
                    </div>
                </li>
                <li>
                    <span class="icon-calendar"></span>
                    <div class="post-specs__info">
                        <span>Срок сдачи</span>
                        <p>4 кв. 2020</p>
                    </div>
                </li>
                <li>
                    <span class="icon-ruller"></span>
                    <div class="post-specs__info">
                        <span>Высота потолков</span>
                        <p>2,7 м</p>
                    </div>
                </li>
                <li>
                    <span class="icon-parking"></span>
                    <div class="post-specs__info">
                        <span>Подземный паркинг</span>
                        <p>Присутствует</p>
                    </div>
                </li>
                <li>
                    <span class="icon-stair"></span>
                    <div class="post-specs__info">
                        <span>Этажность</span>
                        <p>10-17</p>
                    </div>
                </li>
                <li>
                    <span class="icon-wallet"></span>
                    <div class="post-specs__info">
                        <span>Ценовая группа</span>
                        <p>Выше среднего</p>
                    </div>
                </li>
                <li>
                    <span class="icon-rating"></span>
                    <div class="post-specs__info">
                        <span>Рейтинг</span>
                        <p>8.8</p>
                    </div>
                </li>
            </ul>

            <h2 class="page-title-h1">Краткое описание</h2>

            <div class="post-text">
                <p>
                    {{ $house->description }}
                </p>
            </div>

            <h2 class="page-title-h1">Карта</h2>

            <div class="post-map" id="post-map" style="width: 100%; height: 300px;"></div>

        </article>
    </div>
@endsection
