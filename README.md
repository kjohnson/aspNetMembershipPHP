# aspNetMembershipPHP
A port of the ASP.NET Membership password hashing in PHP for migrating user data

## Usage
```php   
$hash = new \AspNetMembershipPHP\Hash( $password, $salt );
$isAuth = (bool) $hash->compareHash( $knownHash );
```

## ASP.NET Implementation

The following is a reduced implementation of the ASP.NET password hashing for comparison. For more specific details, see [System.Web/Security/SQLMembershipProvider.cs](https://referencesource.microsoft.com/#System.Web/Security/SQLMembershipProvider.cs,1900).

```c#				
byte[] bIn = Encoding.Unicode.GetBytes(password);
byte[] bSalt = Convert.FromBase64String(salt);
byte[] bRet = null;

HashAlgorithm hm = new SHA1CryptoServiceProvider();
byte[] bAll = new byte[bSalt.Length + bIn.Length];
Buffer.BlockCopy(bSalt, 0, bAll, 0, bSalt.Length);
Buffer.BlockCopy(bIn, 0, bAll, bSalt.Length, bIn.Length);
bRet = hm.ComputeHash(bAll);

string hash = Convert.ToBase64String(bRet);
```