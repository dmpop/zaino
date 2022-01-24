# Zaino

Zaino is a simple note collector. It makes it possible to save text snippets using the accompanying bookmarklet. The data is saved in a plain text file. The contents of the file is displayed as a list.

## Dependencies

- PHP
- Web server (Apache, Lighttpd, or similar)
- Git (optional)

## Installation and Usage

1. Make sure that your local machine or remote web server has PHP installed.
2. Clone the project's repository using the `git clone https://github.com/dmpop/zaino.git` command. Alternatively, download the latest source code using the appropriate button on the project's page.
3. Open the _zaino/config.php_ file and modify the default settings.


Add the bookmarklet below to the **Bookmarks** toolbar of your browser. Replace _127.0.0.1_ with the actual IP address or domain name of the server running Zaino and _secret_ with the actual key specified in the _config.php_ file.

```javascript
javascript:var note = prompt('Note'); location.href='https://127.0.0.1/index.php?note='+escape(note)+'&url='+encodeURIComponent(location.href)+'&password=secret'
```

To run Zaino locally, switch in the terminal to the _zaino_ directory,  run the `php -S 127.0.0.1:8000` command, and point the browser to the _127.0.0.1:8000_ address.

To install Zaino on a web server with PHP, move the _zaino_ directory to the document root of your server.

To save a snippet, click on the bookmarklet, enter the desired text, and press **OK**.

## Problems?

Please report bugs and issues in the [Issues](https://github.com/dmpop/zaino/issues) section.

## Contribute

If you've found a bug or have a suggestion for improvement, open an issue in the [Issues](https://github.com/dmpop/zaino/issues) section.

To add a new feature or fix issues yourself, follow the following steps.

1. Fork the project's repository
2. Create a feature branch using the `git checkout -b new-feature` command
3. Add your new feature or fix bugs and run the `git commit -am 'Add a new feature'` command to commit changes
4. Push changes using the `git push origin new-feature` command
5. Submit a merge request

## Author

[Dmitri Popov](https://www.tokyomade.photography/)

# License

The [GNU General Public License version 3](http://www.gnu.org/licenses/gpl-3.0.en.html)
