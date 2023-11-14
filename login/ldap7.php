<?php
// Configuración LDAP
$ldapServer = 'ldap://localhost';
$ldapPort = 51144;
$ldapConnection = ldap_connect($ldapServer, $ldapPort);

// Verificar la conexión LDAP
if ($ldapConnection) {
    echo 'Conexión LDAP exitosa.<br>';
} else {
    echo 'Error al establecer la conexión LDAP.<br>';
    exit;
}

// Establecer el nombre de usuario, contraseña y unidad organizativa
$ldapUsername = 'martin'; // Cambia esto al usuario que deseas buscar
$ldapPassword = 'Admin123'; // Cambia esto a la contraseña correspondiente
$ldapBaseDN = 'ou=Usuarios,dc=center,dc=lan'; // Cambia esto según tu estructura de unidades organizativas

// Autenticar un usuario en el servidor LDAP
$ldapBind = ldap_bind($ldapConnection, $ldapUsername, $ldapPassword);

// Verificar si la autenticación fue exitosa
if ($ldapBind) {
    echo 'Autenticación LDAP exitosa.<br>';
} else {
    echo 'Error de autenticación LDAP.<br>';
    ldap_close($ldapConnection); // Cerrar la conexión LDAP
    exit;
}

// Buscar el usuario en el directorio LDAP
$searchFilter = "(&(sAMAccountName=$ldapUsername))"; // Filtrar por nombre de usuario
$searchResult = ldap_search($ldapConnection, $ldapBaseDN, $searchFilter);

if ($searchResult) {
    // Obtener la información del resultado de la búsqueda
    $entries = ldap_get_entries($ldapConnection, $searchResult);

    // Verificar si hay al menos una entrada
    if ($entries['count'] > 0) {
        // Obtener el nombre de usuario
        $ldapUsername = $entries[0]['samaccountname'][0];
        
        // Obtener la unidad organizativa (OU)
        $ldapOU = $entries[0]['dn'];

        echo 'El usuario ' . $ldapUsername . ' pertenece a la unidad organizativa ' . $ldapOU . '.<br>';
        if ($ldapOU= 'Usuarios') {
            echo 'prueba';
            header ("Location: ../html/index.html");
        }
    } else {
        echo 'El usuario ' . $ldapUsername . ' no fue encontrado en el directorio LDAP.<br>';
    }
} else {
    echo 'Error en la búsqueda LDAP: ' . ldap_error($ldapConnection) . '<br>';
}

// Cerrar la conexión LDAP
ldap_close($ldapConnection);
?>
