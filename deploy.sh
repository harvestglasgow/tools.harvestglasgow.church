#!/usr/bin/env bash
echo Starting the deployment
echo =======================
php artisan config:clear

echo Hot swapping the environment
echo ============================
rm .env
cp .env.production .env
echo Environment ready

echo Deploying to AWS
echo ================
serverless deploy
serverless
echo Deploy complete

echo Migrating the database
echo ======================
php artisan migrate --force
echo Migration complete

echo Building the front end
echo ======================
yarn run production

echo Deploying the assets to S3
echo ==========================
echo Deploying CSS
echo =============
aws s3 sync public/css s3://harvest-giving/css --delete
echo Deploying JavaScript
echo ====================
aws s3 sync public/js s3://harvest-giving/js --delete

echo Reverting environment to local
echo =====================
rm .env
cp .env.local .env

echo All done here

