package com.luxand.facerecognition;

import android.app.Activity;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.SharedPreferences.Editor;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ScrollView;
import android.widget.Spinner;
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
import java.util.regex.Matcher;
import java.util.regex.Pattern;


public class Registration_Activity extends Activity {

    private ScrollView scroll;
    private Button save;
    private EditText fname, lname, age, mobile, email, address,username, password;
    private Spinner gender;
    private SharedPreferences prefs;
    private Editor edit;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.registration_layout);
        
        scroll = (ScrollView)findViewById(R.id.scrollView2);
        scroll.setVerticalScrollBarEnabled(false);

        fname = (EditText)findViewById(R.id.fname);
        fname.requestFocus();
        lname = (EditText)findViewById(R.id.lname);
        age = (EditText)findViewById(R.id.age);
        mobile = (EditText)findViewById(R.id.mobile);
        email = (EditText)findViewById(R.id.email);
        address = (EditText)findViewById(R.id.address);
        username = (EditText)findViewById(R.id.username);
        password = (EditText)findViewById(R.id.password);

        gender = (Spinner)findViewById(R.id.spinner_gender);

        save = (Button)findViewById(R.id.save);

        save.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
            	Boolean flag = true, erroremail, errormobile;
            	
            	if(fname.getText().toString().length()== 0){
            		flag = false;
            	}
            	if(lname.getText().toString().length()== 0){
            		flag = false;
            	}
            	if(age.getText().toString().length()== 0){
            		flag = false;
            	}
            	if(gender.getSelectedItemPosition()==0){
            		flag = false;
            	}
            	if(mobile.getText().toString().length()== 0){
            		flag = false;
            	}
            	if(email.getText().toString().length()== 0){
            		flag = false;
            	}
            	if(address.getText().toString().length()== 0){
            		flag = false;
            	}
            	if(username.getText().toString().length()== 0){
            		flag = false;
            	}
            	if(password.getText().toString().length()== 0){
            		flag = false;
            	}
            	if(isEmailValid(email.getText().toString())){
            		
            		erroremail = false;
            	}
            	else{
            		erroremail = true;
            	}
            	if(isMobileValid(mobile.getText().toString())){
            		
            		errormobile = false;
            		
            	}else{
            		
            		errormobile = true;
            	}
	
            	if(flag){
            		if(erroremail){
            			email.setError("Enter valid Email.");
            		}if(errormobile){
            			mobile.setError("Enter valid Mobile number.");
            		}
            		if(erroremail == false && errormobile == false ){
            			new register_user().execute();
            		}
            	}else{
            		Toast.makeText(getApplicationContext(), "Please complete the registartion form", Toast.LENGTH_LONG).show();
            	}
            }
        });

    }
    
    public static boolean isMobileValid(String mobile) {
		boolean isValid = false;

		if (mobile.length() == 10) {
			isValid = true;
		}
		return isValid;
	}
    
    public static boolean isEmailValid(String email) {
		boolean isValid = false;

		String expression = "[a-zA-Z0-9._-]+@[a-zA-Z0-9]+\\.+[a-zA-Z0-9]+";
		CharSequence inputStr = email;

		Pattern pattern = Pattern.compile(expression, Pattern.CASE_INSENSITIVE);
		Matcher matcher = pattern.matcher(inputStr);
		if (matcher.matches()) {
			isValid = true;
		}
		return isValid;
	}

    @Override
    public void onBackPressed()
    {
        Intent intent1 = new Intent(getApplicationContext(), LoginActivity.class);
        startActivity(intent1);
        finish();
    }

    private class register_user extends AsyncTask<String,String,String> {

        InputStream is=null;
        String str;

        protected void onPreExecute()
        {

        }

        protected String doInBackground(String ... param)
        {
            String result = null;
            String function = "register_user";

            HttpClient httpClient =new DefaultHttpClient();
            HttpPost httppost = new HttpPost(Constants.URL+function);

            try
            {
                List<NameValuePair> namevaluepair = new ArrayList<NameValuePair>();
                namevaluepair.add(new BasicNameValuePair("first_name",fname.getText().toString()));
                namevaluepair.add(new BasicNameValuePair("last_name",lname.getText().toString()));
                namevaluepair.add(new BasicNameValuePair("gender",gender.getSelectedItem().toString()));
                namevaluepair.add(new BasicNameValuePair("age",age.getText().toString()));
                namevaluepair.add(new BasicNameValuePair("mobile",mobile.getText().toString()));
                namevaluepair.add(new BasicNameValuePair("email",email.getText().toString()));
                namevaluepair.add(new BasicNameValuePair("address",address.getText().toString()));
                namevaluepair.add(new BasicNameValuePair("username",username.getText().toString()));
                namevaluepair.add(new BasicNameValuePair("password",password.getText().toString()));


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
            	
            	prefs = getSharedPreferences("Is First", MODE_PRIVATE);
                edit = prefs.edit();
                edit.putBoolean("firstrun", false);
                edit.commit();

                JSONObject jobj = new JSONObject(result);
                String success = jobj.getString("success");
                String user_id = jobj.getString("user_id");
                if (success.equalsIgnoreCase("true")) {
                    Toast.makeText(getApplicationContext(),user_id,Toast.LENGTH_LONG).show();
                    Intent intent = new Intent(getApplicationContext(), MainActivity.class);
                    intent.putExtra("user_id", user_id);
                    intent.putExtra("confirmation", "registration");
                    startActivity(intent);
                    finish();

                } else {
                    Toast.makeText(getApplicationContext(),"Registration Failed",Toast.LENGTH_LONG).show();

                }

            } catch (JSONException e) {

                e.printStackTrace();
            }

        }
    }

   
}
