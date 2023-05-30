﻿using WebApplication.Entities;

using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using IntegracjaSystemow8.Model;

namespace IntegracjaSystemow8.Properties.Services;

public interface IUserService
{
    AuthenticationResponse
        Authenticate(AuthenticationRequest request);
    IEnumerable<User> GetUsers();
    User GetByUsername(string username);
    User GetById(int id);
    object Authenticate(WebApplication.Services.AuthenticationRequest request);
}