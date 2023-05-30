using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Configuration;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Authentication.JwtBearer;
using WebApplication.Services;
using WebApplication.Services.Users;
using IntegracjaSystemow8.Properties.Services;

namespace WebApplication.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class UserController : ControllerBase
    {
        private IntegracjaSystemow8.Properties.Services.IUserService userService;

        public IntegracjaSystemow8.Properties.Services.IUserService UserService { get => userService; set => userService = value; }

        public UserController(IntegracjaSystemow8.Properties.Services.IUserService userService)
        {
            this.UserService = userService;
        }

        [HttpPost("authenticate")]
        public IActionResult Authenticate(AuthenticationRequest request)
        {
            var response = UserService.Authenticate(request);
            if (response == null)
                return BadRequest(new { message = "Username or password is incorrect" });

            return Ok(response);
        }

        [HttpGet]
        [Authorize(Roles = "admin", AuthenticationSchemes = JwtBearerDefaults.AuthenticationScheme)] 
        public IActionResult GetUsers()
        {
            var users = UserService.GetUsers();
            return Ok(users);
        }
        
        [HttpGet("user-count")]
        [Authorize(Roles = "user",AuthenticationSchemes = JwtBearerDefaults.AuthenticationScheme)]
        public IActionResult GetUserCount()
        {
            var count = UserService.GetUsers().Count();
            return Ok(new { count });
        }
        
    }
}