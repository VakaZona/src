Воркер для почты
symfony run -d --watch=config,src,templates,vendor symfony console messenger:consume async -vv


symfony console messenger:failed:show

symfony console messenger:failed:retry