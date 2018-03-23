#!/usr/bin/env bash

branch=$(git rev-parse --abbrev-ref HEAD)
remote=$(git remote)
git pull "$remote" "$branch"

changedFiles="$(git diff-tree -r --name-only --no-commit-id ORIG_HEAD HEAD)"
checkRun() {
    echo "$changedFiles" | grep --quiet "$1" && eval "$2"
}

composer dumpautoload
checkRun "composer.json" "composer update -o"
checkRun "package.json" "npm install"
checkRun "database/migrations" "php artisan migrate"
npm run dev
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan route:cache
php artisan view:clear
php artisan clear-compiled
php artisan optimize
