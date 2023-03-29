<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Dashboard | Bibliothèque</title>
    </head>
    @include("Layouts.body_type_mode")
        <div class = "wrapper">
            @include("Layouts.left_navbar")
            <div class = "content-page">
                <div class = "content">
                    @include("Layouts.top_navbar")
                    <div class = "container-fluid">
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "page-title-box">
                                    <div class = "page-title-right">
                                        <form class = "d-flex" method = "get">
                                            <div class = "input-group">
                                                <input type = "text" class = "form-control form-control-light text-capitalize" id = "dash-daterange" value = "<?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo (utf8_decode(strftime('%A %d %B',strtotime(strftime(date('d-m-Y'))))));?>" required disabled>
                                                <span class = "input-group-text bg-primary border-primary text-white">
                                                    <i class = "mdi mdi-calendar-range font-13"></i>
                                                </span>
                                            </div>
                                            <a href = "javascript: void(0)" class = "btn btn-primary ms-2">
                                                <i class = "mdi mdi-autorenew"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <h4 class = "page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include("Layouts.footer")
            </div>
        </div>
        @include("Layouts.right_navbar")
        @include("Layouts.scripts_site")
    </body>
</html>