# purePHPblog

PurePHPblog is a lightweight blogging platform built in PHP that allows the owner to create and manage posts. The platform is designed to be simple to set up and use, with an emphasis on flexibility and ease of customization. You can easily download the code, customize the site to your liking, and start writing posts.

## Features

- **Admin Panel**: Owners of the website have access to an admin panel where they can upload and manage blog posts.
- **User-Friendly Interface**: Users can easily read blog posts and share links without the need for authentication.
- **Firebase Integration**: purePHPblog integrates with Firebase for data storage and management:
  - *Realtime Database*: Stores metadata of blog posts and tracks website activity.
  - *Firebase Storage*: Stores the content of blog posts as Markdown files.
  - *Automatic Views Tracking*: Views are calculated automatically and stored in the Realtime Database.
- **Customization**: The `configure.php` file allows for easy customization of Firebase settings and website preferences.

## Getting Started

To get started with purePHPblog, follow these steps:

1. Clone the repository:
   ```
   git clone https://github.com/ma13w/purePHPblog.git
   ```

2. Modify the `configure.php` file with your Firebase credentials and customize the website settings as needed.

3. Upload the files (.md) into Firebase Storage.

4. Start managing your blog content using the admin panel.

5. Share the link to your blog posts with your audience!

## Usage

### Admin Panel

1. Log in to the admin panel using your credentials.
2. To create a new blog post:
    - Go to the Firebase Storage and upload your Markdown post file, e.g., `name.md`.
    - In the admin panel, specify the filename (`name.md`) and create the post with metadata.

### Viewing Blog Posts

1. Users can browse and read blog posts without the need for authentication.
2. Share the link to blog posts with others to increase visibility.

## Setup Firebase

To set up Firebase for your SimpleBlogPHP project, follow these steps:

### 1. Create a Firebase Project

- Go to the [Firebase Console](https://console.firebase.google.com/) and create a new project.

### 2. Setup Realtime Database

- Create a Realtime Database in your Firebase project.
- Set the database rules to allow read and write access:
  ```
  {
      "rules": {
          ".read": true,
          ".write": true
      }
  }
  ```

### 3. Setup Cloud Storage

- Create a Cloud Storage bucket in your Firebase project.
- Set the storage rules to allow read access and disallow write access:
  ```
  rules_version = '2';

  service firebase.storage {
      match /b/{bucket}/o {
          match /{allPaths=**} {
              allow read: if true;
              allow write: if false;
          }
      }
  }
  ```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
