# ads-manager

This project is a mirror of the ads-manager project. This document, on the other hand, contains information about the establishment, development, backup and management of the project by our colleagues who will participate in the project in the light of the following directive.

## 1. Download

To get the project, run the following command from the terminal, so it will be possible to download the project assets to your computer.

```bash
git clone https://github.com/aliyilmaz/ads-manager.git
```

## 2. Settings
The project is made ready for installation by making the following settings.
### 2.1 Permissions

If you are working on your Apple Mac or a Linux distribution, you need to apply write permission to the project directory with the help of the command below.

```bash
sudo chmod -R 777 ads-manager
```

**Info:**
This command allows the creation of automatically generated files such as .htaccess based on the server software type, as well as the uploading and deletion of files in project sections.

### 2.2 Database

The database type where the project contents will be kept is mysql by default, and sqlite and sqlsrv databases can also be preferred. The database name is ads by default.Before proceeding to the installation step, it is necessary to make sure that the database with this name has not been created before.

### 2.3 Security

If you do not want other users to access the project, you can ensure that only you can access the project with information such as your ip address, operating system and browser name.

For detailed information on this subject, you can read the [related](https://github.com/aliyilmaz/Mind/blob/master/docs/en-readme.md#firewall) article in the Mind Framework document.


## 3. Install
If you write the path you left on your local server from the address line for once and run it, the project installation will take place.