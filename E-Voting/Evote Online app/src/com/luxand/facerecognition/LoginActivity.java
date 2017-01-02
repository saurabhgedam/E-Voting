package com.luxand.facerecognition;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ScrollView;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import com.luxand.facerecognition.R;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.List;


public class LoginActivity extends Activity {

    private ScrollView scroll;
    private Button login;
    private EditText user, pass;
    private TextView register;
    private HttpClient httpclient;
    private HttpResponse response;
    private InputStream is = null;
    private SharedPreferences prefs;
   
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        
        prefs = getSharedPreferences("Is First", MODE_PRIVATE);
        
        scroll = (ScrollView) findViewById(R.id.scrollView);
        user = (EditText) findViewById(R.id.edittext_username);
        pass = (EditText) findViewById(R.id.edittext_password);
        login = (Button) findViewById(R.id.login);
        register = (TextView) findViewById(R.id.register);
        scroll.setVerticalScrollBarEnabled(false);
        
        if(prefs.getBoolean("firstrun", true)){
        	//Toast.makeText(getApplicationContext(), "First Run", Toast.LENGTH_LONG).show();
        	user.setEnabled(false);
        	pass.setEnabled(false);
        	login.setEnabled(false);        	
        	Toast.makeText(getApplicationContext(), "You are running the app for first time. Please register first.", Toast.LENGTH_LONG).show();
        	
        }else{
        	//Toast.makeText(getApplicationContext(), "Problem", Toast.LENGTH_LONG).show();
        	register.setVisibility(View.GONE);
        	Toast.makeText(getApplicationContext(), "You have already registered. Please login using your credentials", Toast.LENGTH_LONG).show();
        }

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String username = user.getText().toString();
                String password = pass.getText().toString();
                new validate_login().execute(username, password);


            }
        });

        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getApplicationContext(), Registration_Activity.class);
                startActivity(intent);
                finish();

            }
        });

    }

    @Override
    public void onBackPressed()
    {
        finish();
    }
   
    private class validate_login extends AsyncTask<String,String,String> {

        String function = "validate_member";
        InputStream is=null;
        String str;

        protected void onPreExecute()
        {

        }

        protected String doInBackground(String ... param)
        {
            String result = null;


            HttpClient httpClient =new DefaultHttpClient();
            HttpPost httppost = new HttpPost(Constants.URL+function);

            try
            {
                List<NameValuePair> namevaluepair = new ArrayList<NameValuePair>();
                namevaluepair.add(new BasicNameValuePair("username",param[0]));
                namevaluepair.add(new BasicNameValuePair("password",param[1]));


                httppost.setEntity(new UrlEncodedFormEntity(namevaluepair));

                HttpResponse response =httpClient.execute(httppost);
                HttpEntity entity = response.getEntity();
                //	String str = EntityUtils.toString(entity);

                // read content
                is = entity.getContent();

            } catch (Exception e) {

                Log.e("log_tag", "Error in http connection " + e.toString());
            }
            try {
                BufferedReader br = new BufferedReader(
                        new InputStreamReader(is));
                StringBuilder sb = new StringBuilder();
                String line = "";
                while ((line = br.readLine()) != null) {
                    sb.append(line + "\n");
                }
                is.close();
                str = sb.toString();
                System.out.println("?????????????????"+str);


            }
            catch (Exception e) {

                Log.e("log_tag", "Error converting result " + e.toString());
            }
            return str;



        }

        @Override
        protected void onPostExecute(String result) {
            try {

                JSONObject jobj = new JSONObject(result);
                String success = jobj.getString("success");
                String user_id = jobj.getString("user_id");
                if (success.equalsIgnoreCase("true")) {
                    Intent intent = new Intent(getApplicationContext(), Election_List.class);
                    intent.putExtra("user_id", user_id);
                    startActivity(intent);
                    finish();

                } else {
                    Toast.makeText(getApplicationContext(),"Invalid Username/Password",Toast.LENGTH_LONG).show();

                }

            } catch (JSONException e) {

                e.printStackTrace();
            }

        }
    }
}