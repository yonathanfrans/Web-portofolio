#!/bin/bash

# Pastikan direktori assets/img memiliki izin yang benar
chmod -R 775 /app/public/assets/file
chown -R www-data:www-data /app/public/assets/file

