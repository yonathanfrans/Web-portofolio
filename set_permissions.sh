#!/bin/bash

# Pastikan direktori assets/img memiliki izin yang benar
chmod -R 775 /public/assets/file
chown -R www-data:www-data /public/assets/file

