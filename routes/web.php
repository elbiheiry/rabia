<?php
/**
 * Adminpanel routes
 */
Route::post('lang', ['as' => 'lang', 'uses' => 'LangController@postIndex']);
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::group(['namespace' => 'Auth'], function () {
        Route::get('/login', ['as' => 'admin.auth', 'uses' => 'LoginController@getLogin']);
        Route::post('/login', ['as' => 'admin.auth', 'uses' => 'LoginController@postLogin']);
        Route::get('/logout', 'LoginController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'], function () {

        //dashboard route
        Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@getIndex']);

        /**
         * articles routes
         */
        Route::group(['prefix' => 'articles'], function () {
            Route::get('/', ['as' => 'admin.articles', 'uses' => 'ArticleController@getIndex']);
            Route::post('/', ['as' => 'admin.articles', 'uses' => 'ArticleController@postIndex']);
            Route::get('/info/{article}', ['as' => 'admin.articles.info', 'uses' => 'ArticleController@getInfo']);
            Route::post('/edit/{article}', ['as' => 'admin.articles.edit', 'uses' => 'ArticleController@postEdit']);
            Route::get('/delete/{article}', ['as' => 'admin.articles.delete', 'uses' => 'ArticleController@getDelete']);
        });

        /**
         * certificates routes
         */
        Route::group(['prefix' => 'certificates'], function () {
            Route::get('/', ['as' => 'admin.certificates', 'uses' => 'CertificateController@getIndex']);
            Route::post('/', ['as' => 'admin.certificates', 'uses' => 'CertificateController@postIndex']);
            Route::get('/info/{id}', ['as' => 'admin.certificates.info', 'uses' => 'CertificateController@getInfo']);
            Route::post('/edit/{id}', ['as' => 'admin.certificates.edit', 'uses' => 'CertificateController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.certificates.delete', 'uses' => 'CertificateController@getDelete']);
        });


        /**
         * services routes
         */
        Route::group(['prefix' => 'services'], function () {
            Route::get('/', ['as' => 'admin.services', 'uses' => 'ServiceController@getIndex']);
            Route::post('/', ['as' => 'admin.services', 'uses' => 'ServiceController@postIndex']);
            Route::get('/info/{service}', ['as' => 'admin.services.info', 'uses' => 'ServiceController@getInfo']);
            Route::post('/edit/{service}', ['as' => 'admin.services.edit', 'uses' => 'ServiceController@postEdit']);
            Route::get('/delete/{service}', ['as' => 'admin.services.delete', 'uses' => 'ServiceController@getDelete']);

            /**
             * images route
             */
            Route::group(['prefix' => 'images'], function () {
                Route::get('/{id}', ['as' => 'admin.services.images', 'uses' => 'ServiceImageController@getIndex']);
                Route::post('/{id}', ['as' => 'admin.services.images', 'uses' => 'ServiceImageController@postIndex']);
                Route::get('/info/{id}', ['as' => 'admin.services.images.info', 'uses' => 'ServiceImageController@getInfo']);
                Route::post('/edit/{id}', ['as' => 'admin.services.images.edit', 'uses' => 'ServiceImageController@postEdit']);
                Route::post('/delete/{id}', ['as' => 'admin.services.images.delete', 'uses' => 'ServiceImageController@postDelete']);
            });

            /**
             * videos route
             */
            Route::group(['prefix' => 'videos'], function () {
                Route::get('/{id}', ['as' => 'admin.services.videos', 'uses' => 'VideoController@getIndex']);
                Route::post('/{id}', ['as' => 'admin.services.videos', 'uses' => 'VideoController@postIndex']);
                Route::get('/info/{id}', ['as' => 'admin.services.videos.info', 'uses' => 'VideoController@getInfo']);
                Route::post('/edit/{id}', ['as' => 'admin.services.videos.edit', 'uses' => 'VideoController@postEdit']);
                Route::post('/delete/{id}', ['as' => 'admin.services.videos.delete', 'uses' => 'VideoController@postDelete']);
            });
        });

        /**
         * homepage routes
         */
        Route::group(['prefix' => 'home-page'], function () {
            /**
             * slider route
             */
            Route::group(['prefix' => 'slider'], function () {
                Route::get('/', ['as' => 'admin.sliders', 'uses' => 'SliderController@getIndex']);
                Route::post('/', ['as' => 'admin.sliders', 'uses' => 'SliderController@postIndex']);
                Route::get('/info/{id}', ['as' => 'admin.sliders.info', 'uses' => 'SliderController@getInfo']);
                Route::post('/edit/{id}', ['as' => 'admin.sliders.edit', 'uses' => 'SliderController@postEdit']);
                Route::get('/delete/{id}', ['as' => 'admin.sliders.delete', 'uses' => 'SliderController@getDelete']);
            });

            /**
             * partners route
             */
            Route::group(['prefix' => 'partners'], function () {
                Route::get('/', ['as' => 'admin.partners', 'uses' => 'PartnerController@getIndex']);
                Route::post('/', ['as' => 'admin.partners', 'uses' => 'PartnerController@postIndex']);
                Route::get('/info/{id}', ['as' => 'admin.partners.info', 'uses' => 'PartnerController@getInfo']);
                Route::post('/edit/{id}', ['as' => 'admin.partners.edit', 'uses' => 'PartnerController@postEdit']);
                Route::get('/delete/{id}', ['as' => 'admin.partners.delete', 'uses' => 'PartnerController@getDelete']);
            });

            /**
             * sections routes
             */
            Route::group(['prefix' => 'sections'], function () {
                Route::get('/', ['as' => 'admin.sections', 'uses' => 'HomeSectionController@getIndex']);
                Route::get('/info/{id}', ['as' => 'admin.sections.info', 'uses' => 'HomeSectionController@getInfo']);
                Route::post('/edit/{id}', ['as' => 'admin.sections.edit', 'uses' => 'HomeSectionController@postEdit']);
            });
        });

        /**
         * projects routes
         */
        Route::group(['prefix' => 'projects'], function () {
            Route::get('/', ['as' => 'admin.projects', 'uses' => 'ProjectController@getIndex']);
            Route::post('/', ['as' => 'admin.projects', 'uses' => 'ProjectController@postIndex']);
            Route::get('/info/{project}', ['as' => 'admin.projects.info', 'uses' => 'ProjectController@getInfo']);
            Route::post('/edit/{project}', ['as' => 'admin.projects.edit', 'uses' => 'ProjectController@postEdit']);
            Route::get('/delete/{project}', ['as' => 'admin.projects.delete', 'uses' => 'ProjectController@getDelete']);

            /**
             * images route
             */
            Route::group(['prefix' => 'images'], function () {
                Route::get('/{id}', ['as' => 'admin.projects.images', 'uses' => 'ProjectImageController@getIndex']);
                Route::post('/{id}', ['as' => 'admin.projects.images', 'uses' => 'ProjectImageController@postIndex']);
                Route::get('/info/{id}', ['as' => 'admin.projects.images.info', 'uses' => 'ProjectImageController@getInfo']);
                Route::post('/edit/{id}', ['as' => 'admin.projects.images.edit', 'uses' => 'ProjectImageController@postEdit']);
                Route::post('/images/delete/{id}', ['as' => 'admin.projects.images.delete', 'uses' => 'ProjectImageController@postDelete']);
            });
        });

        /**
         * work-filters routes
         */
        Route::group(['prefix' => 'work'], function () {
            Route::get('/', ['as' => 'admin.filters', 'uses' => 'WorkFilterController@getIndex']);
            Route::post('/', ['as' => 'admin.filters', 'uses' => 'WorkFilterController@postIndex']);
            Route::get('/info/{id}', ['as' => 'admin.filters.info', 'uses' => 'WorkFilterController@getInfo']);
            Route::post('/edit/{id}', ['as' => 'admin.filters.edit', 'uses' => 'WorkFilterController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.filters.delete', 'uses' => 'WorkFilterController@getDelete']);
        });

        /**
         * about-us routes
         */
        Route::group(['prefix' => 'about-us'], function () {
            Route::get('/', ['as' => 'admin.about', 'uses' => 'AboutController@getIndex']);
            Route::get('/info/{id}', ['as' => 'admin.about.info', 'uses' => 'AboutController@getInfo']);
            Route::post('/edit/{id}', ['as' => 'admin.about.edit', 'uses' => 'AboutController@postEdit']);
        });

        /**
         * site-info routes
         */
        Route::group(['prefix' => 'site-info'], function () {
            Route::get('/', ['as' => 'admin.settings', 'uses' => 'SettingController@getIndex']);
            Route::post('/', ['as' => 'admin.settings', 'uses' => 'SettingController@postIndex']);
        });

        /**
         * candidates route
         */
        Route::group(['prefix' => 'candidates'], function () {
            Route::get('/', ['as' => 'admin.candidates', 'uses' => 'CareerController@getIndex']);
            Route::get('/delete/{id}', ['as' => 'admin.candidates.delete', 'uses' => 'CareerController@getDelete']);
        });

        /**
         * messages route
         */
        Route::group(['prefix' => 'messages'], function () {
            Route::get('/', ['as' => 'admin.messages', 'uses' => 'MessageController@getIndex']);
            Route::get('/delete/{id}', ['as' => 'admin.messages.delete', 'uses' => 'MessageController@getDelete']);
        });
    });
});


////////////////////// site routes ////////////////
Route::group(['namespace' => 'Site'], function () {
    /**
     * home route
     */
    Route::get('/', ['as' => 'site.index', 'uses' => 'HomeController@getIndex']);

    /**
     * about us route
     */
    Route::get('/about-us', ['as' => 'site.about', 'uses' => 'AboutController@getIndex']);

    /**
     * services route
     */
    Route::get('/services/{service}', ['as' => 'site.services', 'uses' => 'ServiceController@getService']);

    /**
     * works route
     */
    Route::get('/works', ['as' => 'site.projects', 'uses' => 'ProjectController@getIndex']);
    Route::get('/work/{slug}', ['as' => 'site.project', 'uses' => 'ProjectController@getProject']);

    /**
     * blogs route
     */
    Route::get('/blogs', ['as' => 'site.blogs', 'uses' => 'BlogController@getIndex']);
    Route::get('/blog/{slug}', ['as' => 'site.blog', 'uses' => 'BlogController@getSingleBlog']);

    /**
     * certificates route
     */
    Route::get('/certificates', ['as' => 'site.certificates', 'uses' => 'CertificateController@getIndex']);

    /**
     * careers route
     */
    Route::get('/careers', ['as' => 'site.careers', 'uses' => 'CareerController@getIndex']);
    Route::post('careers', ['as' => 'site.careers', 'uses' => 'CareerController@postIndex']);

    /**
     * contact route
     */
    Route::get('/contact-us', ['as' => 'site.contact', 'uses' => 'ContactController@getIndex']);
    Route::post('/contact-us', ['as' => 'site.contact', 'uses' => 'ContactController@postIndex']);

});