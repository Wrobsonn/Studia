using System.Text;
using IntegracjaSystemow8.Properties.Services;
using Microsoft.AspNetCore.Authentication.JwtBearer;
using Microsoft.IdentityModel.Tokens;


namespace IntegracjaSystemow8;

public class Startup
{
    public Startup(IConfiguration configuration)
    {
        this.configuration = configuration;
    }
    public IConfiguration configuration { get; }
    public void ConfigureServices(IServiceCollection
        services)
    {
        services.AddCors();
        services.AddControllers();
        services.AddScoped<IUserService,
            UserServiceImpl>();
        services.AddAuthentication(auth =>
        {
            auth.DefaultAuthenticateScheme =
                JwtBearerDefaults.AuthenticationScheme;
        })
            .AddJwtBearer(options =>
            {
                options.TokenValidationParameters = new
                    TokenValidationParameters
                {
                    ValidateIssuer = false,
                    ValidateAudience = false,
                    ValidateLifetime = true,
                    ValidateIssuerSigningKey = true,
                    IssuerSigningKey = new
                                SymmetricSecurityKey(Encoding.UTF8.GetBytes(configuration["Jwt:Key"])),
                    ClockSkew = TimeSpan.Zero
                };
            });
    }
    public void Configure(IApplicationBuilder app,
        IWebHostEnvironment env)
    {
        app.UseRouting();
        app.UseAuthentication();
        app.UseAuthorization();
        app.UseCors(x => x
            .AllowAnyOrigin()
            .AllowAnyMethod()
            .AllowAnyHeader());
        app.UseEndpoints(endpoints =>
        {
            endpoints.MapControllers();
        });
    }
}