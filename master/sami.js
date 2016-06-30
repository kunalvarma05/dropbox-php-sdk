
(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">Kunnu</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Kunnu_Dropbox" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Kunnu/Dropbox.html">Dropbox</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Kunnu_Dropbox_Authentication" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Kunnu/Dropbox/Authentication.html">Authentication</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Kunnu_Dropbox_Authentication_DropboxAuthHelper" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Authentication/DropboxAuthHelper.html">DropboxAuthHelper</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Authentication_OAuth2Client" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Authentication/OAuth2Client.html">OAuth2Client</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Kunnu_Dropbox_Exceptions" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Kunnu/Dropbox/Exceptions.html">Exceptions</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Kunnu_Dropbox_Exceptions_DropboxClientException" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Exceptions/DropboxClientException.html">DropboxClientException</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Kunnu_Dropbox_Http" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Kunnu/Dropbox/Http.html">Http</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Kunnu_Dropbox_Http_Clients" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Kunnu/Dropbox/Http/Clients.html">Clients</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Kunnu_Dropbox_Http_Clients_DropboxGuzzleHttpClient" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Kunnu/Dropbox/Http/Clients/DropboxGuzzleHttpClient.html">DropboxGuzzleHttpClient</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Http_Clients_DropboxHttpClientFactory" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Kunnu/Dropbox/Http/Clients/DropboxHttpClientFactory.html">DropboxHttpClientFactory</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Http_Clients_DropboxHttpClientInterface" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Kunnu/Dropbox/Http/Clients/DropboxHttpClientInterface.html">DropboxHttpClientInterface</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Kunnu_Dropbox_Http_DropboxRawResponse" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Http/DropboxRawResponse.html">DropboxRawResponse</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Http_RequestBodyInterface" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Http/RequestBodyInterface.html">RequestBodyInterface</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Http_RequestBodyJsonEncoded" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Http/RequestBodyJsonEncoded.html">RequestBodyJsonEncoded</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Http_RequestBodyStream" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Http/RequestBodyStream.html">RequestBodyStream</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Kunnu_Dropbox_Models" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Kunnu/Dropbox/Models.html">Models</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Kunnu_Dropbox_Models_AccessToken" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/AccessToken.html">AccessToken</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_Account" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/Account.html">Account</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_AccountList" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/AccountList.html">AccountList</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_BaseModel" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/BaseModel.html">BaseModel</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_CopyReference" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/CopyReference.html">CopyReference</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_DeletedMetadata" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/DeletedMetadata.html">DeletedMetadata</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_File" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/File.html">File</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_FileMetadata" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/FileMetadata.html">FileMetadata</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_FileSharingInfo" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/FileSharingInfo.html">FileSharingInfo</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_FolderMetadata" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/FolderMetadata.html">FolderMetadata</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_FolderSharingInfo" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/FolderSharingInfo.html">FolderSharingInfo</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_MediaInfo" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/MediaInfo.html">MediaInfo</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_MediaMetadata" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/MediaMetadata.html">MediaMetadata</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_MetadataCollection" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/MetadataCollection.html">MetadataCollection</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_ModelCollection" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/ModelCollection.html">ModelCollection</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_ModelFactory" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/ModelFactory.html">ModelFactory</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_ModelInterface" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/ModelInterface.html">ModelInterface</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_PhotoMetadata" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/PhotoMetadata.html">PhotoMetadata</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_SearchResult" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/SearchResult.html">SearchResult</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_SearchResults" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/SearchResults.html">SearchResults</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_TemporaryLink" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/TemporaryLink.html">TemporaryLink</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_Thumbnail" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/Thumbnail.html">Thumbnail</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Models_VideoMetadata" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Models/VideoMetadata.html">VideoMetadata</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Kunnu_Dropbox_Security" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Kunnu/Dropbox/Security.html">Security</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Kunnu_Dropbox_Security_McryptRandomStringGenerator" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Security/McryptRandomStringGenerator.html">McryptRandomStringGenerator</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Security_OpenSslRandomStringGenerator" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Security/OpenSslRandomStringGenerator.html">OpenSslRandomStringGenerator</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Security_RandomStringGeneratorFactory" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Security/RandomStringGeneratorFactory.html">RandomStringGeneratorFactory</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Security_RandomStringGeneratorInterface" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Security/RandomStringGeneratorInterface.html">RandomStringGeneratorInterface</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Security_RandomStringGeneratorTrait" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Security/RandomStringGeneratorTrait.html">RandomStringGeneratorTrait</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Kunnu_Dropbox_Store" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Kunnu/Dropbox/Store.html">Store</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Kunnu_Dropbox_Store_PersistentDataStoreFactory" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Store/PersistentDataStoreFactory.html">PersistentDataStoreFactory</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Store_PersistentDataStoreInterface" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Store/PersistentDataStoreInterface.html">PersistentDataStoreInterface</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_Store_SessionPersistentDataStore" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kunnu/Dropbox/Store/SessionPersistentDataStore.html">SessionPersistentDataStore</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Kunnu_Dropbox_Dropbox" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Kunnu/Dropbox/Dropbox.html">Dropbox</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_DropboxApp" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Kunnu/Dropbox/DropboxApp.html">DropboxApp</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_DropboxClient" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Kunnu/Dropbox/DropboxClient.html">DropboxClient</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_DropboxFile" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Kunnu/Dropbox/DropboxFile.html">DropboxFile</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_DropboxRequest" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Kunnu/Dropbox/DropboxRequest.html">DropboxRequest</a>                    </div>                </li>                            <li data-name="class:Kunnu_Dropbox_DropboxResponse" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Kunnu/Dropbox/DropboxResponse.html">DropboxResponse</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "Kunnu.html", "name": "Kunnu", "doc": "Namespace Kunnu"},{"type": "Namespace", "link": "Kunnu/Dropbox.html", "name": "Kunnu\\Dropbox", "doc": "Namespace Kunnu\\Dropbox"},{"type": "Namespace", "link": "Kunnu/Dropbox/Http.html", "name": "Kunnu\\Dropbox\\Http", "doc": "Namespace Kunnu\\Dropbox\\Http"},{"type": "Namespace", "link": "Kunnu/Dropbox/Http/Clients.html", "name": "Kunnu\\Dropbox\\Http\\Clients", "doc": "Namespace Kunnu\\Dropbox\\Http\\Clients"},{"type": "Namespace", "link": "Kunnu/Dropbox/Models.html", "name": "Kunnu\\Dropbox\\Models", "doc": "Namespace Kunnu\\Dropbox\\Models"},{"type": "Namespace", "link": "Kunnu/Dropbox/Security.html", "name": "Kunnu\\Dropbox\\Security", "doc": "Namespace Kunnu\\Dropbox\\Security"},{"type": "Namespace", "link": "Kunnu/Dropbox/Store.html", "name": "Kunnu\\Dropbox\\Store", "doc": "Namespace Kunnu\\Dropbox\\Store"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Http\\Clients", "fromLink": "Kunnu/Dropbox/Http/Clients.html", "link": "Kunnu/Dropbox/Http/Clients/DropboxGuzzleHttpClient.html", "name": "Kunnu\\Dropbox\\Http\\Clients\\DropboxGuzzleHttpClient", "doc": "&quot;DropboxGuzzleHttpClient&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Http\\Clients\\DropboxGuzzleHttpClient", "fromLink": "Kunnu/Dropbox/Http/Clients/DropboxGuzzleHttpClient.html", "link": "Kunnu/Dropbox/Http/Clients/DropboxGuzzleHttpClient.html#method___construct", "name": "Kunnu\\Dropbox\\Http\\Clients\\DropboxGuzzleHttpClient::__construct", "doc": "&quot;Create a new DropboxGuzzleHttpClient instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Http\\Clients\\DropboxGuzzleHttpClient", "fromLink": "Kunnu/Dropbox/Http/Clients/DropboxGuzzleHttpClient.html", "link": "Kunnu/Dropbox/Http/Clients/DropboxGuzzleHttpClient.html#method_send", "name": "Kunnu\\Dropbox\\Http\\Clients\\DropboxGuzzleHttpClient::send", "doc": "&quot;Send request to the server and fetch the raw response&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Http\\Clients\\DropboxGuzzleHttpClient", "fromLink": "Kunnu/Dropbox/Http/Clients/DropboxGuzzleHttpClient.html", "link": "Kunnu/Dropbox/Http/Clients/DropboxGuzzleHttpClient.html#method_getResponseBody", "name": "Kunnu\\Dropbox\\Http\\Clients\\DropboxGuzzleHttpClient::getResponseBody", "doc": "&quot;Get the Response Body&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Http", "fromLink": "Kunnu/Dropbox/Http.html", "link": "Kunnu/Dropbox/Http/RequestBodyJsonEncoded.html", "name": "Kunnu\\Dropbox\\Http\\RequestBodyJsonEncoded", "doc": "&quot;RequestBodyJsonEncoded&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Http\\RequestBodyJsonEncoded", "fromLink": "Kunnu/Dropbox/Http/RequestBodyJsonEncoded.html", "link": "Kunnu/Dropbox/Http/RequestBodyJsonEncoded.html#method___construct", "name": "Kunnu\\Dropbox\\Http\\RequestBodyJsonEncoded::__construct", "doc": "&quot;Create a new RequestBodyJsonEncoded instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Http\\RequestBodyJsonEncoded", "fromLink": "Kunnu/Dropbox/Http/RequestBodyJsonEncoded.html", "link": "Kunnu/Dropbox/Http/RequestBodyJsonEncoded.html#method_getBody", "name": "Kunnu\\Dropbox\\Http\\RequestBodyJsonEncoded::getBody", "doc": "&quot;Get the Body of the Request&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Http", "fromLink": "Kunnu/Dropbox/Http.html", "link": "Kunnu/Dropbox/Http/RequestBodyStream.html", "name": "Kunnu\\Dropbox\\Http\\RequestBodyStream", "doc": "&quot;RequestBodyStream&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Http\\RequestBodyStream", "fromLink": "Kunnu/Dropbox/Http/RequestBodyStream.html", "link": "Kunnu/Dropbox/Http/RequestBodyStream.html#method___construct", "name": "Kunnu\\Dropbox\\Http\\RequestBodyStream::__construct", "doc": "&quot;Create a new RequestBodyStream instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Http\\RequestBodyStream", "fromLink": "Kunnu/Dropbox/Http/RequestBodyStream.html", "link": "Kunnu/Dropbox/Http/RequestBodyStream.html#method_getBody", "name": "Kunnu\\Dropbox\\Http\\RequestBodyStream::getBody", "doc": "&quot;Get the Body of the Request&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Models", "fromLink": "Kunnu/Dropbox/Models.html", "link": "Kunnu/Dropbox/Models/AccessToken.html", "name": "Kunnu\\Dropbox\\Models\\AccessToken", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\AccessToken", "fromLink": "Kunnu/Dropbox/Models/AccessToken.html", "link": "Kunnu/Dropbox/Models/AccessToken.html#method___construct", "name": "Kunnu\\Dropbox\\Models\\AccessToken::__construct", "doc": "&quot;Create a new AccessToken instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\AccessToken", "fromLink": "Kunnu/Dropbox/Models/AccessToken.html", "link": "Kunnu/Dropbox/Models/AccessToken.html#method_getToken", "name": "Kunnu\\Dropbox\\Models\\AccessToken::getToken", "doc": "&quot;Get Access Token&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\AccessToken", "fromLink": "Kunnu/Dropbox/Models/AccessToken.html", "link": "Kunnu/Dropbox/Models/AccessToken.html#method_getTokenType", "name": "Kunnu\\Dropbox\\Models\\AccessToken::getTokenType", "doc": "&quot;Get Token Type&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\AccessToken", "fromLink": "Kunnu/Dropbox/Models/AccessToken.html", "link": "Kunnu/Dropbox/Models/AccessToken.html#method_getBearer", "name": "Kunnu\\Dropbox\\Models\\AccessToken::getBearer", "doc": "&quot;Get Bearer&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\AccessToken", "fromLink": "Kunnu/Dropbox/Models/AccessToken.html", "link": "Kunnu/Dropbox/Models/AccessToken.html#method_getUid", "name": "Kunnu\\Dropbox\\Models\\AccessToken::getUid", "doc": "&quot;Get User ID&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\AccessToken", "fromLink": "Kunnu/Dropbox/Models/AccessToken.html", "link": "Kunnu/Dropbox/Models/AccessToken.html#method_getAccountId", "name": "Kunnu\\Dropbox\\Models\\AccessToken::getAccountId", "doc": "&quot;Get Account ID&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\AccessToken", "fromLink": "Kunnu/Dropbox/Models/AccessToken.html", "link": "Kunnu/Dropbox/Models/AccessToken.html#method_getTeamId", "name": "Kunnu\\Dropbox\\Models\\AccessToken::getTeamId", "doc": "&quot;Get Team ID&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Models", "fromLink": "Kunnu/Dropbox/Models.html", "link": "Kunnu/Dropbox/Models/Account.html", "name": "Kunnu\\Dropbox\\Models\\Account", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\Account", "fromLink": "Kunnu/Dropbox/Models/Account.html", "link": "Kunnu/Dropbox/Models/Account.html#method___construct", "name": "Kunnu\\Dropbox\\Models\\Account::__construct", "doc": "&quot;Create a new Account instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\Account", "fromLink": "Kunnu/Dropbox/Models/Account.html", "link": "Kunnu/Dropbox/Models/Account.html#method_getAccountId", "name": "Kunnu\\Dropbox\\Models\\Account::getAccountId", "doc": "&quot;Get Account ID&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\Account", "fromLink": "Kunnu/Dropbox/Models/Account.html", "link": "Kunnu/Dropbox/Models/Account.html#method_getNameDetails", "name": "Kunnu\\Dropbox\\Models\\Account::getNameDetails", "doc": "&quot;Get Account User&#039;s Name Details&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\Account", "fromLink": "Kunnu/Dropbox/Models/Account.html", "link": "Kunnu/Dropbox/Models/Account.html#method_getDisplayName", "name": "Kunnu\\Dropbox\\Models\\Account::getDisplayName", "doc": "&quot;Get Display name&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\Account", "fromLink": "Kunnu/Dropbox/Models/Account.html", "link": "Kunnu/Dropbox/Models/Account.html#method_getEmail", "name": "Kunnu\\Dropbox\\Models\\Account::getEmail", "doc": "&quot;Get Account Email&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\Account", "fromLink": "Kunnu/Dropbox/Models/Account.html", "link": "Kunnu/Dropbox/Models/Account.html#method_emailIsVerified", "name": "Kunnu\\Dropbox\\Models\\Account::emailIsVerified", "doc": "&quot;Whether account email is verified&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\Account", "fromLink": "Kunnu/Dropbox/Models/Account.html", "link": "Kunnu/Dropbox/Models/Account.html#method_getProfilePhotoUrl", "name": "Kunnu\\Dropbox\\Models\\Account::getProfilePhotoUrl", "doc": "&quot;Get Profile Pic URL&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\Account", "fromLink": "Kunnu/Dropbox/Models/Account.html", "link": "Kunnu/Dropbox/Models/Account.html#method_isDisabled", "name": "Kunnu\\Dropbox\\Models\\Account::isDisabled", "doc": "&quot;Whether acocunt has been disabled&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\Account", "fromLink": "Kunnu/Dropbox/Models/Account.html", "link": "Kunnu/Dropbox/Models/Account.html#method_getCountry", "name": "Kunnu\\Dropbox\\Models\\Account::getCountry", "doc": "&quot;Get User&#039;s two-lettered country code&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\Account", "fromLink": "Kunnu/Dropbox/Models/Account.html", "link": "Kunnu/Dropbox/Models/Account.html#method_getLocale", "name": "Kunnu\\Dropbox\\Models\\Account::getLocale", "doc": "&quot;Get account language&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\Account", "fromLink": "Kunnu/Dropbox/Models/Account.html", "link": "Kunnu/Dropbox/Models/Account.html#method_getReferralLink", "name": "Kunnu\\Dropbox\\Models\\Account::getReferralLink", "doc": "&quot;Get user&#039;s referral link&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\Account", "fromLink": "Kunnu/Dropbox/Models/Account.html", "link": "Kunnu/Dropbox/Models/Account.html#method_isPaired", "name": "Kunnu\\Dropbox\\Models\\Account::isPaired", "doc": "&quot;Whether work account is paired&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\Account", "fromLink": "Kunnu/Dropbox/Models/Account.html", "link": "Kunnu/Dropbox/Models/Account.html#method_getAccountType", "name": "Kunnu\\Dropbox\\Models\\Account::getAccountType", "doc": "&quot;Get Account Type&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Models", "fromLink": "Kunnu/Dropbox/Models.html", "link": "Kunnu/Dropbox/Models/BaseModel.html", "name": "Kunnu\\Dropbox\\Models\\BaseModel", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\BaseModel", "fromLink": "Kunnu/Dropbox/Models/BaseModel.html", "link": "Kunnu/Dropbox/Models/BaseModel.html#method___construct", "name": "Kunnu\\Dropbox\\Models\\BaseModel::__construct", "doc": "&quot;Create a new Model instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\BaseModel", "fromLink": "Kunnu/Dropbox/Models/BaseModel.html", "link": "Kunnu/Dropbox/Models/BaseModel.html#method_getData", "name": "Kunnu\\Dropbox\\Models\\BaseModel::getData", "doc": "&quot;Get the Model data&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\BaseModel", "fromLink": "Kunnu/Dropbox/Models/BaseModel.html", "link": "Kunnu/Dropbox/Models/BaseModel.html#method_getDataProperty", "name": "Kunnu\\Dropbox\\Models\\BaseModel::getDataProperty", "doc": "&quot;Get Data Property&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\BaseModel", "fromLink": "Kunnu/Dropbox/Models/BaseModel.html", "link": "Kunnu/Dropbox/Models/BaseModel.html#method___get", "name": "Kunnu\\Dropbox\\Models\\BaseModel::__get", "doc": "&quot;Handle calls to undefined properties.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\BaseModel", "fromLink": "Kunnu/Dropbox/Models/BaseModel.html", "link": "Kunnu/Dropbox/Models/BaseModel.html#method___set", "name": "Kunnu\\Dropbox\\Models\\BaseModel::__set", "doc": "&quot;Handle calls to undefined properties.&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Models", "fromLink": "Kunnu/Dropbox/Models.html", "link": "Kunnu/Dropbox/Models/CopyReference.html", "name": "Kunnu\\Dropbox\\Models\\CopyReference", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\CopyReference", "fromLink": "Kunnu/Dropbox/Models/CopyReference.html", "link": "Kunnu/Dropbox/Models/CopyReference.html#method___construct", "name": "Kunnu\\Dropbox\\Models\\CopyReference::__construct", "doc": "&quot;Create a new CopyReference instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\CopyReference", "fromLink": "Kunnu/Dropbox/Models/CopyReference.html", "link": "Kunnu/Dropbox/Models/CopyReference.html#method_setMetadata", "name": "Kunnu\\Dropbox\\Models\\CopyReference::setMetadata", "doc": "&quot;Set Metadata&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\CopyReference", "fromLink": "Kunnu/Dropbox/Models/CopyReference.html", "link": "Kunnu/Dropbox/Models/CopyReference.html#method_getExpirationDate", "name": "Kunnu\\Dropbox\\Models\\CopyReference::getExpirationDate", "doc": "&quot;Get the expiration date of the copy reference&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\CopyReference", "fromLink": "Kunnu/Dropbox/Models/CopyReference.html", "link": "Kunnu/Dropbox/Models/CopyReference.html#method_getMetadata", "name": "Kunnu\\Dropbox\\Models\\CopyReference::getMetadata", "doc": "&quot;The metadata for the file\/folder&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\CopyReference", "fromLink": "Kunnu/Dropbox/Models/CopyReference.html", "link": "Kunnu/Dropbox/Models/CopyReference.html#method_getReference", "name": "Kunnu\\Dropbox\\Models\\CopyReference::getReference", "doc": "&quot;Get the copy reference&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Models", "fromLink": "Kunnu/Dropbox/Models.html", "link": "Kunnu/Dropbox/Models/DeletedMetadata.html", "name": "Kunnu\\Dropbox\\Models\\DeletedMetadata", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\DeletedMetadata", "fromLink": "Kunnu/Dropbox/Models/DeletedMetadata.html", "link": "Kunnu/Dropbox/Models/DeletedMetadata.html#method___construct", "name": "Kunnu\\Dropbox\\Models\\DeletedMetadata::__construct", "doc": "&quot;Create a new DeletedtMetadata instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\DeletedMetadata", "fromLink": "Kunnu/Dropbox/Models/DeletedMetadata.html", "link": "Kunnu/Dropbox/Models/DeletedMetadata.html#method_getName", "name": "Kunnu\\Dropbox\\Models\\DeletedMetadata::getName", "doc": "&quot;Get the &#039;name&#039; property of the metadata.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\DeletedMetadata", "fromLink": "Kunnu/Dropbox/Models/DeletedMetadata.html", "link": "Kunnu/Dropbox/Models/DeletedMetadata.html#method_getPathLower", "name": "Kunnu\\Dropbox\\Models\\DeletedMetadata::getPathLower", "doc": "&quot;Get the &#039;path_lower&#039; property of the metadata.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\DeletedMetadata", "fromLink": "Kunnu/Dropbox/Models/DeletedMetadata.html", "link": "Kunnu/Dropbox/Models/DeletedMetadata.html#method_getPathDisplay", "name": "Kunnu\\Dropbox\\Models\\DeletedMetadata::getPathDisplay", "doc": "&quot;Get the &#039;path_display&#039; property of the metadata.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\DeletedMetadata", "fromLink": "Kunnu/Dropbox/Models/DeletedMetadata.html", "link": "Kunnu/Dropbox/Models/DeletedMetadata.html#method_getSharingInfo", "name": "Kunnu\\Dropbox\\Models\\DeletedMetadata::getSharingInfo", "doc": "&quot;Get the &#039;sharing_info&#039; property of the file model.&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Models", "fromLink": "Kunnu/Dropbox/Models.html", "link": "Kunnu/Dropbox/Models/File.html", "name": "Kunnu\\Dropbox\\Models\\File", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\File", "fromLink": "Kunnu/Dropbox/Models/File.html", "link": "Kunnu/Dropbox/Models/File.html#method___construct", "name": "Kunnu\\Dropbox\\Models\\File::__construct", "doc": "&quot;Create a new File instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\File", "fromLink": "Kunnu/Dropbox/Models/File.html", "link": "Kunnu/Dropbox/Models/File.html#method_getMetadata", "name": "Kunnu\\Dropbox\\Models\\File::getMetadata", "doc": "&quot;The metadata for the file&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\File", "fromLink": "Kunnu/Dropbox/Models/File.html", "link": "Kunnu/Dropbox/Models/File.html#method_getContents", "name": "Kunnu\\Dropbox\\Models\\File::getContents", "doc": "&quot;Get the file contents&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Models", "fromLink": "Kunnu/Dropbox/Models.html", "link": "Kunnu/Dropbox/Models/FileMetadata.html", "name": "Kunnu\\Dropbox\\Models\\FileMetadata", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FileMetadata", "fromLink": "Kunnu/Dropbox/Models/FileMetadata.html", "link": "Kunnu/Dropbox/Models/FileMetadata.html#method___construct", "name": "Kunnu\\Dropbox\\Models\\FileMetadata::__construct", "doc": "&quot;Create a new FileMetadata instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FileMetadata", "fromLink": "Kunnu/Dropbox/Models/FileMetadata.html", "link": "Kunnu/Dropbox/Models/FileMetadata.html#method_getId", "name": "Kunnu\\Dropbox\\Models\\FileMetadata::getId", "doc": "&quot;Get the &#039;id&#039; property of the file model.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FileMetadata", "fromLink": "Kunnu/Dropbox/Models/FileMetadata.html", "link": "Kunnu/Dropbox/Models/FileMetadata.html#method_getName", "name": "Kunnu\\Dropbox\\Models\\FileMetadata::getName", "doc": "&quot;Get the &#039;name&#039; property of the file model.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FileMetadata", "fromLink": "Kunnu/Dropbox/Models/FileMetadata.html", "link": "Kunnu/Dropbox/Models/FileMetadata.html#method_getRev", "name": "Kunnu\\Dropbox\\Models\\FileMetadata::getRev", "doc": "&quot;Get the &#039;rev&#039; property of the file model.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FileMetadata", "fromLink": "Kunnu/Dropbox/Models/FileMetadata.html", "link": "Kunnu/Dropbox/Models/FileMetadata.html#method_getSize", "name": "Kunnu\\Dropbox\\Models\\FileMetadata::getSize", "doc": "&quot;Get the &#039;size&#039; property of the file model.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FileMetadata", "fromLink": "Kunnu/Dropbox/Models/FileMetadata.html", "link": "Kunnu/Dropbox/Models/FileMetadata.html#method_getPathLower", "name": "Kunnu\\Dropbox\\Models\\FileMetadata::getPathLower", "doc": "&quot;Get the &#039;path_lower&#039; property of the file model.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FileMetadata", "fromLink": "Kunnu/Dropbox/Models/FileMetadata.html", "link": "Kunnu/Dropbox/Models/FileMetadata.html#method_getMediaInfo", "name": "Kunnu\\Dropbox\\Models\\FileMetadata::getMediaInfo", "doc": "&quot;Get the &#039;media_info&#039; property of the file model.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FileMetadata", "fromLink": "Kunnu/Dropbox/Models/FileMetadata.html", "link": "Kunnu/Dropbox/Models/FileMetadata.html#method_getSharingInfo", "name": "Kunnu\\Dropbox\\Models\\FileMetadata::getSharingInfo", "doc": "&quot;Get the &#039;sharing_info&#039; property of the file model.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FileMetadata", "fromLink": "Kunnu/Dropbox/Models/FileMetadata.html", "link": "Kunnu/Dropbox/Models/FileMetadata.html#method_getPathDisplay", "name": "Kunnu\\Dropbox\\Models\\FileMetadata::getPathDisplay", "doc": "&quot;Get the &#039;path_display&#039; property of the file model.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FileMetadata", "fromLink": "Kunnu/Dropbox/Models/FileMetadata.html", "link": "Kunnu/Dropbox/Models/FileMetadata.html#method_getClientModified", "name": "Kunnu\\Dropbox\\Models\\FileMetadata::getClientModified", "doc": "&quot;Get the &#039;client_modified&#039; property of the file model.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FileMetadata", "fromLink": "Kunnu/Dropbox/Models/FileMetadata.html", "link": "Kunnu/Dropbox/Models/FileMetadata.html#method_getServerModified", "name": "Kunnu\\Dropbox\\Models\\FileMetadata::getServerModified", "doc": "&quot;Get the &#039;server_modified&#039; property of the file model.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FileMetadata", "fromLink": "Kunnu/Dropbox/Models/FileMetadata.html", "link": "Kunnu/Dropbox/Models/FileMetadata.html#method_hasExplicitSharedMembers", "name": "Kunnu\\Dropbox\\Models\\FileMetadata::hasExplicitSharedMembers", "doc": "&quot;Get the &#039;has&lt;em&gt;explicit&lt;\/em&gt;shared_members&#039; property of the file model.&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Models", "fromLink": "Kunnu/Dropbox/Models.html", "link": "Kunnu/Dropbox/Models/FileSharingInfo.html", "name": "Kunnu\\Dropbox\\Models\\FileSharingInfo", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FileSharingInfo", "fromLink": "Kunnu/Dropbox/Models/FileSharingInfo.html", "link": "Kunnu/Dropbox/Models/FileSharingInfo.html#method___construct", "name": "Kunnu\\Dropbox\\Models\\FileSharingInfo::__construct", "doc": "&quot;Create a new File Sharing Info instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FileSharingInfo", "fromLink": "Kunnu/Dropbox/Models/FileSharingInfo.html", "link": "Kunnu/Dropbox/Models/FileSharingInfo.html#method_isReadOnly", "name": "Kunnu\\Dropbox\\Models\\FileSharingInfo::isReadOnly", "doc": "&quot;True if the file or folder is inside a read-only shared folder.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FileSharingInfo", "fromLink": "Kunnu/Dropbox/Models/FileSharingInfo.html", "link": "Kunnu/Dropbox/Models/FileSharingInfo.html#method_getParentSharedFolderId", "name": "Kunnu\\Dropbox\\Models\\FileSharingInfo::getParentSharedFolderId", "doc": "&quot;ID of shared folder that holds this file.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FileSharingInfo", "fromLink": "Kunnu/Dropbox/Models/FileSharingInfo.html", "link": "Kunnu/Dropbox/Models/FileSharingInfo.html#method_getModifiedBy", "name": "Kunnu\\Dropbox\\Models\\FileSharingInfo::getModifiedBy", "doc": "&quot;Get the last user who modified the file.&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Models", "fromLink": "Kunnu/Dropbox/Models.html", "link": "Kunnu/Dropbox/Models/FolderMetadata.html", "name": "Kunnu\\Dropbox\\Models\\FolderMetadata", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FolderMetadata", "fromLink": "Kunnu/Dropbox/Models/FolderMetadata.html", "link": "Kunnu/Dropbox/Models/FolderMetadata.html#method___construct", "name": "Kunnu\\Dropbox\\Models\\FolderMetadata::__construct", "doc": "&quot;Create a new FolderMetadata instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FolderMetadata", "fromLink": "Kunnu/Dropbox/Models/FolderMetadata.html", "link": "Kunnu/Dropbox/Models/FolderMetadata.html#method_getId", "name": "Kunnu\\Dropbox\\Models\\FolderMetadata::getId", "doc": "&quot;Get the &#039;id&#039; property of the folder model.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FolderMetadata", "fromLink": "Kunnu/Dropbox/Models/FolderMetadata.html", "link": "Kunnu/Dropbox/Models/FolderMetadata.html#method_getName", "name": "Kunnu\\Dropbox\\Models\\FolderMetadata::getName", "doc": "&quot;Get the &#039;name&#039; property of the folder model.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FolderMetadata", "fromLink": "Kunnu/Dropbox/Models/FolderMetadata.html", "link": "Kunnu/Dropbox/Models/FolderMetadata.html#method_getPathLower", "name": "Kunnu\\Dropbox\\Models\\FolderMetadata::getPathLower", "doc": "&quot;Get the &#039;path_lower&#039; property of the folder model.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FolderMetadata", "fromLink": "Kunnu/Dropbox/Models/FolderMetadata.html", "link": "Kunnu/Dropbox/Models/FolderMetadata.html#method_getSharingInfo", "name": "Kunnu\\Dropbox\\Models\\FolderMetadata::getSharingInfo", "doc": "&quot;Get the &#039;sharing_info&#039; property of the folder model.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FolderMetadata", "fromLink": "Kunnu/Dropbox/Models/FolderMetadata.html", "link": "Kunnu/Dropbox/Models/FolderMetadata.html#method_getPathDisplay", "name": "Kunnu\\Dropbox\\Models\\FolderMetadata::getPathDisplay", "doc": "&quot;Get the &#039;path_display&#039; property of the folder model.&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Models", "fromLink": "Kunnu/Dropbox/Models.html", "link": "Kunnu/Dropbox/Models/FolderSharingInfo.html", "name": "Kunnu\\Dropbox\\Models\\FolderSharingInfo", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FolderSharingInfo", "fromLink": "Kunnu/Dropbox/Models/FolderSharingInfo.html", "link": "Kunnu/Dropbox/Models/FolderSharingInfo.html#method___construct", "name": "Kunnu\\Dropbox\\Models\\FolderSharingInfo::__construct", "doc": "&quot;Create a new Folder Sharing Info instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FolderSharingInfo", "fromLink": "Kunnu/Dropbox/Models/FolderSharingInfo.html", "link": "Kunnu/Dropbox/Models/FolderSharingInfo.html#method_isReadOnly", "name": "Kunnu\\Dropbox\\Models\\FolderSharingInfo::isReadOnly", "doc": "&quot;True if the folder or folder is inside a read-only shared folder.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FolderSharingInfo", "fromLink": "Kunnu/Dropbox/Models/FolderSharingInfo.html", "link": "Kunnu/Dropbox/Models/FolderSharingInfo.html#method_getParentSharedFolderId", "name": "Kunnu\\Dropbox\\Models\\FolderSharingInfo::getParentSharedFolderId", "doc": "&quot;ID of shared folder that holds this folder.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\FolderSharingInfo", "fromLink": "Kunnu/Dropbox/Models/FolderSharingInfo.html", "link": "Kunnu/Dropbox/Models/FolderSharingInfo.html#method_getSharedFolderId", "name": "Kunnu\\Dropbox\\Models\\FolderSharingInfo::getSharedFolderId", "doc": "&quot;ID of shared folder.&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Models", "fromLink": "Kunnu/Dropbox/Models.html", "link": "Kunnu/Dropbox/Models/MediaInfo.html", "name": "Kunnu\\Dropbox\\Models\\MediaInfo", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\MediaInfo", "fromLink": "Kunnu/Dropbox/Models/MediaInfo.html", "link": "Kunnu/Dropbox/Models/MediaInfo.html#method___construct", "name": "Kunnu\\Dropbox\\Models\\MediaInfo::__construct", "doc": "&quot;Create a new MediaInfo instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\MediaInfo", "fromLink": "Kunnu/Dropbox/Models/MediaInfo.html", "link": "Kunnu/Dropbox/Models/MediaInfo.html#method_setMediaMetadata", "name": "Kunnu\\Dropbox\\Models\\MediaInfo::setMediaMetadata", "doc": "&quot;Set Media Metadata&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\MediaInfo", "fromLink": "Kunnu/Dropbox/Models/MediaInfo.html", "link": "Kunnu/Dropbox/Models/MediaInfo.html#method_isPending", "name": "Kunnu\\Dropbox\\Models\\MediaInfo::isPending", "doc": "&quot;Indicates whether the photo\/video is still under\nprocessing and is the metadata available yet.&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\MediaInfo", "fromLink": "Kunnu/Dropbox/Models/MediaInfo.html", "link": "Kunnu/Dropbox/Models/MediaInfo.html#method_getMediaMetadata", "name": "Kunnu\\Dropbox\\Models\\MediaInfo::getMediaMetadata", "doc": "&quot;The metadata for the photo\/video.&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Models", "fromLink": "Kunnu/Dropbox/Models.html", "link": "Kunnu/Dropbox/Models/MediaMetadata.html", "name": "Kunnu\\Dropbox\\Models\\MediaMetadata", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\MediaMetadata", "fromLink": "Kunnu/Dropbox/Models/MediaMetadata.html", "link": "Kunnu/Dropbox/Models/MediaMetadata.html#method___construct", "name": "Kunnu\\Dropbox\\Models\\MediaMetadata::__construct", "doc": "&quot;Create a new MediaMetadata instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\MediaMetadata", "fromLink": "Kunnu/Dropbox/Models/MediaMetadata.html", "link": "Kunnu/Dropbox/Models/MediaMetadata.html#method_getLocation", "name": "Kunnu\\Dropbox\\Models\\MediaMetadata::getLocation", "doc": "&quot;Get the location of the Media&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\MediaMetadata", "fromLink": "Kunnu/Dropbox/Models/MediaMetadata.html", "link": "Kunnu/Dropbox/Models/MediaMetadata.html#method_getDimensions", "name": "Kunnu\\Dropbox\\Models\\MediaMetadata::getDimensions", "doc": "&quot;Get the dimensions of the Media&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\MediaMetadata", "fromLink": "Kunnu/Dropbox/Models/MediaMetadata.html", "link": "Kunnu/Dropbox/Models/MediaMetadata.html#method_getTimeTaken", "name": "Kunnu\\Dropbox\\Models\\MediaMetadata::getTimeTaken", "doc": "&quot;Get the Time the Media was taken on&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Models", "fromLink": "Kunnu/Dropbox/Models.html", "link": "Kunnu/Dropbox/Models/SearchResult.html", "name": "Kunnu\\Dropbox\\Models\\SearchResult", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\SearchResult", "fromLink": "Kunnu/Dropbox/Models/SearchResult.html", "link": "Kunnu/Dropbox/Models/SearchResult.html#method___construct", "name": "Kunnu\\Dropbox\\Models\\SearchResult::__construct", "doc": "&quot;Create a new SearchResult instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\SearchResult", "fromLink": "Kunnu/Dropbox/Models/SearchResult.html", "link": "Kunnu/Dropbox/Models/SearchResult.html#method_setMetadata", "name": "Kunnu\\Dropbox\\Models\\SearchResult::setMetadata", "doc": "&quot;Set Metadata&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\SearchResult", "fromLink": "Kunnu/Dropbox/Models/SearchResult.html", "link": "Kunnu/Dropbox/Models/SearchResult.html#method_getMatchType", "name": "Kunnu\\Dropbox\\Models\\SearchResult::getMatchType", "doc": "&quot;Indicates what type of match was found for the result&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\SearchResult", "fromLink": "Kunnu/Dropbox/Models/SearchResult.html", "link": "Kunnu/Dropbox/Models/SearchResult.html#method_getMetadata", "name": "Kunnu\\Dropbox\\Models\\SearchResult::getMetadata", "doc": "&quot;Get the Search Result Metadata&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Models", "fromLink": "Kunnu/Dropbox/Models.html", "link": "Kunnu/Dropbox/Models/SearchResults.html", "name": "Kunnu\\Dropbox\\Models\\SearchResults", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\SearchResults", "fromLink": "Kunnu/Dropbox/Models/SearchResults.html", "link": "Kunnu/Dropbox/Models/SearchResults.html#method_processItems", "name": "Kunnu\\Dropbox\\Models\\SearchResults::processItems", "doc": "&quot;Process items and cast them\nto their respective Models&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Models", "fromLink": "Kunnu/Dropbox/Models.html", "link": "Kunnu/Dropbox/Models/TemporaryLink.html", "name": "Kunnu\\Dropbox\\Models\\TemporaryLink", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\TemporaryLink", "fromLink": "Kunnu/Dropbox/Models/TemporaryLink.html", "link": "Kunnu/Dropbox/Models/TemporaryLink.html#method___construct", "name": "Kunnu\\Dropbox\\Models\\TemporaryLink::__construct", "doc": "&quot;Create a new TemporaryLink instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\TemporaryLink", "fromLink": "Kunnu/Dropbox/Models/TemporaryLink.html", "link": "Kunnu/Dropbox/Models/TemporaryLink.html#method_setMetadata", "name": "Kunnu\\Dropbox\\Models\\TemporaryLink::setMetadata", "doc": "&quot;Set Metadata&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\TemporaryLink", "fromLink": "Kunnu/Dropbox/Models/TemporaryLink.html", "link": "Kunnu/Dropbox/Models/TemporaryLink.html#method_getMetadata", "name": "Kunnu\\Dropbox\\Models\\TemporaryLink::getMetadata", "doc": "&quot;The metadata for the file&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\TemporaryLink", "fromLink": "Kunnu/Dropbox/Models/TemporaryLink.html", "link": "Kunnu/Dropbox/Models/TemporaryLink.html#method_getLink", "name": "Kunnu\\Dropbox\\Models\\TemporaryLink::getLink", "doc": "&quot;Get the temporary link&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Models", "fromLink": "Kunnu/Dropbox/Models.html", "link": "Kunnu/Dropbox/Models/VideoMetadata.html", "name": "Kunnu\\Dropbox\\Models\\VideoMetadata", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\VideoMetadata", "fromLink": "Kunnu/Dropbox/Models/VideoMetadata.html", "link": "Kunnu/Dropbox/Models/VideoMetadata.html#method___construct", "name": "Kunnu\\Dropbox\\Models\\VideoMetadata::__construct", "doc": "&quot;Create a new VideoMetadata instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Models\\VideoMetadata", "fromLink": "Kunnu/Dropbox/Models/VideoMetadata.html", "link": "Kunnu/Dropbox/Models/VideoMetadata.html#method_getDuration", "name": "Kunnu\\Dropbox\\Models\\VideoMetadata::getDuration", "doc": "&quot;Get the duration of the video&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Security", "fromLink": "Kunnu/Dropbox/Security.html", "link": "Kunnu/Dropbox/Security/McryptRandomStringGenerator.html", "name": "Kunnu\\Dropbox\\Security\\McryptRandomStringGenerator", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Security\\McryptRandomStringGenerator", "fromLink": "Kunnu/Dropbox/Security/McryptRandomStringGenerator.html", "link": "Kunnu/Dropbox/Security/McryptRandomStringGenerator.html#method___construct", "name": "Kunnu\\Dropbox\\Security\\McryptRandomStringGenerator::__construct", "doc": "&quot;Create a new McryptRandomStringGenerator instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Security\\McryptRandomStringGenerator", "fromLink": "Kunnu/Dropbox/Security/McryptRandomStringGenerator.html", "link": "Kunnu/Dropbox/Security/McryptRandomStringGenerator.html#method_generateString", "name": "Kunnu\\Dropbox\\Security\\McryptRandomStringGenerator::generateString", "doc": "&quot;Get a randomly generated secure token&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Security", "fromLink": "Kunnu/Dropbox/Security.html", "link": "Kunnu/Dropbox/Security/OpenSslRandomStringGenerator.html", "name": "Kunnu\\Dropbox\\Security\\OpenSslRandomStringGenerator", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Security\\OpenSslRandomStringGenerator", "fromLink": "Kunnu/Dropbox/Security/OpenSslRandomStringGenerator.html", "link": "Kunnu/Dropbox/Security/OpenSslRandomStringGenerator.html#method___construct", "name": "Kunnu\\Dropbox\\Security\\OpenSslRandomStringGenerator::__construct", "doc": "&quot;Create a new OpenSslRandomStringGenerator instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Security\\OpenSslRandomStringGenerator", "fromLink": "Kunnu/Dropbox/Security/OpenSslRandomStringGenerator.html", "link": "Kunnu/Dropbox/Security/OpenSslRandomStringGenerator.html#method_generateString", "name": "Kunnu\\Dropbox\\Security\\OpenSslRandomStringGenerator::generateString", "doc": "&quot;Get a randomly generated secure token&quot;"},
            
            {"type": "Class", "fromName": "Kunnu\\Dropbox\\Store", "fromLink": "Kunnu/Dropbox/Store.html", "link": "Kunnu/Dropbox/Store/SessionPersistentDataStore.html", "name": "Kunnu\\Dropbox\\Store\\SessionPersistentDataStore", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kunnu\\Dropbox\\Store\\SessionPersistentDataStore", "fromLink": "Kunnu/Dropbox/Store/SessionPersistentDataStore.html", "link": "Kunnu/Dropbox/Store/SessionPersistentDataStore.html#method___construct", "name": "Kunnu\\Dropbox\\Store\\SessionPersistentDataStore::__construct", "doc": "&quot;Create a new SessionPersistentDataStore instance&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Store\\SessionPersistentDataStore", "fromLink": "Kunnu/Dropbox/Store/SessionPersistentDataStore.html", "link": "Kunnu/Dropbox/Store/SessionPersistentDataStore.html#method_get", "name": "Kunnu\\Dropbox\\Store\\SessionPersistentDataStore::get", "doc": "&quot;Get a value from the store&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Store\\SessionPersistentDataStore", "fromLink": "Kunnu/Dropbox/Store/SessionPersistentDataStore.html", "link": "Kunnu/Dropbox/Store/SessionPersistentDataStore.html#method_set", "name": "Kunnu\\Dropbox\\Store\\SessionPersistentDataStore::set", "doc": "&quot;Set a value in the store&quot;"},
                    {"type": "Method", "fromName": "Kunnu\\Dropbox\\Store\\SessionPersistentDataStore", "fromLink": "Kunnu/Dropbox/Store/SessionPersistentDataStore.html", "link": "Kunnu/Dropbox/Store/SessionPersistentDataStore.html#method_clear", "name": "Kunnu\\Dropbox\\Store\\SessionPersistentDataStore::clear", "doc": "&quot;Clear the key from the store&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


