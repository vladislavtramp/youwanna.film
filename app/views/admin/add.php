<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add</title>
    <link href="/public/styles/admin.css" rel="stylesheet">
    <link href="/public/styles/bootstrap.css" rel="stylesheet">
    <link href="/public/styles/font-awesome.css" rel="stylesheet">
</head>
<body>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/add" method="post">
                            <div class="mb-3">
                                <label for="title" class="form-label">Название тайтла</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="rating" class="form-label">Рейтинг тайтла</label>
                                <input type="text" name="rating" id="rating" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="image_url" class="form-label">Ссылка на картинку</label>
                                <input type="text" name="image_url" id="image_url" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="type" class="form-label">Тип аниме (ТВ-Сериал)</label>
                                <input type="text" name="type" id="type" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="episodes" class="form-label">Сколько эпизодов</label>
                                <input type="text" name="episodes" id="episodes" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Статус (онгоинг)</label>
                                <input type="text" name="status" id="status" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="genre" class="form-label">Жанр</label>
                                <input type="text" name="genre" id="genre" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="original_source" class="form-label">Первоисточник</label>
                                <input type="text" name="original_source" id="original_source" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="season" class="form-label">Сезон</label>
                                <input type="text" name="season" id="season" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="comes_out" class="form-label">С какого числав выходит</label>
                                <input type="text" name="comes_out" id="comes_out" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="studio" class="form-label">Студия</label>
                                <input type="text" name="studio" id="studio" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="rating_mpaa" class="form-label">Рейтинг Маппа</label>
                                <input type="text" name="rating_mpaa" id="rating_mpaa" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="age_limit" class="form-label">Возрастное ограничение</label>
                                <input type="text" name="age_limit" id="age_limit" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="duration" class="form-label">Длительность эпизода</label>
                                <input type="text" name="duration" id="duration" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="voice_project" class="form-label">Проекты, что озвучивали</label>
                                <input type="text" name="voice_project" id="voice_project" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="filmed_by" class="form-label">По какому ранобе снято</label>
                                <input type="text" name="filmed_by" id="filmed_by" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Описание аниме</label>
                                <input type="text" name="description" id="description" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="video_link" class="form-label">Ссылка на плеер</label>
                                <input type="text" name="video_link" id="video_link" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>