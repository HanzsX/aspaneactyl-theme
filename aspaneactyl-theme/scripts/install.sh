#!/bin/bash

# Fungsi untuk menampilkan menu
function show_menu() {
    clear
    echo "==============================="
    echo " Pterodactyl Theme Installer"
    echo "==============================="
    echo "1. Install Aspaneactyl Theme"
    echo "2. Uninstall Aspaneactyl Theme"
    echo "3. Exit"
    echo -n "Please choose an option [1-3]: "
    read choice
    case $choice in
        1) install_theme ;;
        2) uninstall_theme ;;
        3) exit 0 ;;
        *) echo "Invalid option, try again." ; sleep 2 ; show_menu ;;
    esac
}

# Fungsi untuk menginstal tema
function install_theme() {
    echo "Installing Aspaneactyl theme..."

    # Clone repositori tema dari GitHub
    git clone https://github.com/username/aspaneactyl-theme.git /var/www/pterodactyl

    # Menyalin file tema ke folder Pterodactyl
    cp /var/www/pterodactyl/theme/aspaneactyl.css /var/www/pterodactyl/resources/assets/css/

    # Menyusun ulang aset frontend
    cd /var/www/pterodactyl
    npm run dev

    echo "Theme installed successfully!"
    sleep 2
    show_menu
}

# Fungsi untuk menghapus tema
function uninstall_theme() {
    echo "Uninstalling Aspaneactyl theme..."

    # Menghapus file tema
    rm -f /var/www/pterodactyl/resources/assets/css/aspaneactyl.css

    # Menyusun ulang aset frontend
    cd /var/www/pterodactyl
    npm run dev

    echo "Theme uninstalled successfully!"
    sleep 2
    show_menu
}

# Menjalankan menu utama
show_menu
