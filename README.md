# The Las Pegasus Radio RESTful API

## Development roadmap:
- **(Done)** ~~Basic database connectivity~~
- Users (ID, unique nickname, e-mail address, password, permissions level, registration IP address, last login IP address, last login, avatar url, totp secret key, oauth2 code)
	- **(Done without e-mail registration)** ~~User account registration~~
	- **(Done)** ~~Getting user information~~
	- **(Done without being available through API yet)** ~~User credentials validation~~
	- **(In progress)** User account edit function
	- **(In progress)** User account deletion
	- **(Scheduled)** Two factor authentication
- Invite codes (ID, date issued, issuer, invite code (random sha1), boolean if already used, new user)
	- **(Scheduled)** Create new invite code
	- **(Scheduled)** Validate invite code
- Song entries (ID, song title, album title, song file location on drive, album cover url)
	- **(Scheduled)** Adding and removing song entries
	- **(Scheduled)** Viewing song information (Both from database and Icecast)
- Song likes (ID, song ID, user ID, status)
	- **(Scheduled)** Adding status for user
	- **(Scheduled)** Getting status information for user
	- **(Scheduled)** Removing statuses

Development roadmap may be subject to be changed.

